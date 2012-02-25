<h1><?=$this->view->category_title?></h1>
<div style="margin-bottom: 10px;">
	<?if(!empty($this->view->childs)){?>
		<div class="publish_info" style="width:620px;">
		<?=Yii::t('common', 'Subcategories')?>&nbsp;:&nbsp; 
		<?foreach ($this->view->childs as $k){?>
			<?$url = Yii::app()->createUrl('ad/index', array('category_title' => DCUtil::getSeoTitle($k->category_title), 'cid' => $k->category_id));?>
			&raquo; <a href="<?=$url?>" title="<?=$k->category_title?>"><?=$k->category_title?></a>&nbsp;
		<?}//end of foreach?>	
		</div>
	<?}//end of if?>
	<?if(!empty($this->view->adList)){?>
		<?foreach ($this->view->adList as $k){
			$adUrl = Yii::app()->createUrl('ad/detail' , array('title' => DCUtil::getSeoTitle( stripslashes($k->ad_title) ), 'id' => $k->ad_id));
			?>
		    <div class="classified_list_container">
		        <div class="classified_list_pic"><a href="<?=$adUrl?>"><img src="<?=AdPic::model()->getSmallPic( $k->ad_id )?>" width="120" height="90"></a></div>
		        <div class="classified_list_description">
		            <a href="<?=$adUrl?>"><?=stripslashes($k->ad_title)?></a>
		            <p><?=DCUtil::getShortDescription( stripslashes($k->ad_description) )?></p>
		            <p class="info"><?=Yii::t('common', 'Location')?> : <b><?=$k->location->location_name?></b> | <?=Yii::t('common', 'Category')?> : <b><?=$k->category->category_title?></b> | <?=Yii::t('common', 'Publish date')?> : <b><?=$k->ad_publish_date?></b></p>
		        </div>
		        <div class="clear"></div>
		    </div>
		<?}//end of foreach?>	    
    <?} else {?>
    	<div class="publish_info">
		<?=Yii::t('common', 'Ups... No Classifieds Here')?>
		</div>
    <?}//end of if?>
</div>
<?php $this->widget('CLinkPager', array('pages' => $pages, 'cssFile' => Yii::app()->theme->baseUrl . '/front/style/pager.css')) ?>