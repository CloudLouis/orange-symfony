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
class CategoryForm extends BaseForm {
    private $categoryService;

    public function getCategoryService() {
        if (is_null($this->categoryService)) {
            $this->categoryService = new CategoryService();
            $this->categoryService->setCategoryDao(new CategoryDao());
        }
        return $this->categoryService;
    }

    public function configure() {
        $this->setWidgets(array(
            'categoryId' => new sfWidgetFormInputHidden(),
            'name*' => new sfWidgetFormInputText(),
            'code*' => new sfWidgetFormInputText(),
        ));

        $this->setValidators(array(
            'categoryId' => new sfValidatorNumber(array('required' => false)),
            'name*' => new sfValidatorString(array('required' => true, 'max_length' => 100)),
            'code*' => new sfValidatorString(array('required' => true, 'max_length' => 100))
        ));

        $this->widgetSchema->setNameFormat('category[%s]');
    }

    public function save() {

        $categoryId = $this->getValue('categoryId');
        if (!empty($categoryId)) {
            $category = $this->getCategoryService()->getCategoryById($categoryId);
        } else {
            $category = new category();
        }
        $category->setName($this->getValue('name*'));
        $category->setCode($this->getValue('code*'));
        $category->save();
    }

    public function getCategoryListAsJson() {

        $list = array();
        $categoryList = $this->getCategoryService()->getCategoryList();
        foreach ($categoryList as $category) {
            $list[] = array('id' => $category->getId(), 'name' => $category->getName());
        }
        return json_encode($list);
    }
}

