<?
/**********************************************************************************
* DClassifieds                                                                    *
* Open-Source Project Inspired by Dinko Georgiev (webmaster@dclassifieds.eu)      *
* =============================================================================== *
* Software Version:           2.0                                           	  *
* Software by:                Dinko Georgiev     								  *
* Support, News, Updates at:  http://www.dclassifieds.eu                       	  *
***********************************************************************************
* This program is free software; you may redistribute it and/or modify it under   *
* the terms of the provided license.          									  *
*                                                                                 *
* This program is distributed in the hope that it is and will be useful, but      *
* WITHOUT ANY WARRANTIES; without even any implied warranty of MERCHANTABILITY    *
* or FITNESS FOR A PARTICULAR PURPOSE.                                            *
*                                                                                 *
* See the "license.txt" file for details of the license.                          *
* The latest version can always be found at http://www.gnu.org/licenses/gpl.txt   *
**********************************************************************************/
class TagsBoxWidget extends CWidget 
{
    public function run()
    {
    	$criteria = new CDbCriteria();
    	$criteria->limit = 20;
    	$criteria->order = 'tag_id DESC';
    	
		$tagsArray = AdTag::model()->findAll( $criteria );
		if(!empty($tagsArray)){
			
			//render widget view
			$this->render('tags_box_widget_tpl', array('tagsArray' => $tagsArray));
		}
    }
}