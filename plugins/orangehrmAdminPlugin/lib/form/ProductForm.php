<?php

/**
 * OrangeHRM is a comprehensive Human Resource Management (HRM) System that captures
 * all the essential functionalities required for any enterprise.
 * Copyright (C) 2006 OrangeHRM Inc., http://www.orangehrm.com
 *
 * OrangeHRM is free software; you can redistribute it and/or modify it under the terms of
 * the GNU General Public License as published by the Free Software Foundation; either
 * version 2 of the License, or (at your option) any later version.
 *
 * OrangeHRM is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with this program;
 * if not, write to the Free Software Foundation, Inc., 51 Franklin Street, Fifth Floor,
 * Boston, MA  02110-1301, USA
 *
 */
class ProductForm extends BaseForm {
    private $productService;

    public function getProductService() {
        if (is_null($this->productService)) {
            $this->productService = new ProductService();
            $this->productService->setProductDao(new ProductDao());
        }
        return $this->productService;
    }

    public function configure() {
        $category = $this->getItemCategoryList();

        $this->setWidgets(array(
            'productId' => new sfWidgetFormInputHidden(),
            'name*' => new sfWidgetFormInputText(),
            'provider*' => new sfWidgetFormInputText(),
            'category*' => new sfWidgetFormSelect(array('choices' => $category), array("class" => "formSelect", "maxlength" => 3)),
            'specifications*' => new sfWidgetFormInputText()
        ));

        $this->setValidators(array(
            'productId' => new sfValidatorNumber(array('required' => false)),
            'name*' => new sfValidatorString(array('required' => true, 'max_length' => 100)),
            'category*' => new sfValidatorNumber(array('required' => true)),
            'provider*' => new sfValidatorString(array('required' => true, 'max_length' => 100)),
            'specifications*' => new sfValidatorString(array('required' => true, 'max_length' => 100))
        ));

        $this->widgetSchema->setNameFormat('product[%s]');
    }



    private function getItemCategoryList() {
        $list = array();
        $itemCategory = $this->getProductService()->getCategory();

        $list[0] = '--Pick a category--';
        foreach ($itemCategory as $cat) {
            $list[$cat->getId()] = $cat->getName();
        }
        return $list;
    }

    public function save() {

        $productId = $this->getValue('productId');
        if (!empty($productId)) {
            $product = $this->getProductService()->getProductById($productId);
        } else {
            $product = new Product();
        }
        $product->setName($this->getValue('name*'));
        $product->setProvider($this->getValue('provider*'));
        $product->setSpecifications($this->getValue('specifications*'));
        $product->setCategoryId($this->getValue('category*'));
        $product->save();
    }

    public function getProductListAsJson() {

        $list = array();
        $productList = $this->getProductService()->getProductList();
        foreach ($productList as $product) {
            $list[] = array('id' => $product->getId(), 'name' => $product->getName());
        }
        return json_encode($list);
    }
}

