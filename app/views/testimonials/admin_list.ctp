<?php
$newUrl = "list".$urlString;
$urlArray = array(
	'field' 	=> $search1,
	'value' 	=> $search2
);
$paginator->options(array('url'=>$urlArray));
?>
<?php echo $form->create('Testimonial',array('action'=>$newUrl,'method'=>'POST', "class" => "longFieldsForm", "name" => "listForm", "id" => "mainform")); ?>
<!--  start content-table-inner -->
	<div id="content-table-inner">
	<?php $user = $session->read("SESSION_ADMIN"); ?>
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
	<td>                                              	
	<!--  start table-content  -->
			<div id="table-content">
			<?php echo $session->flash(); ?>
			<table cellspacing="0" cellpadding="4" border="0" align="center" class="top-search" style="margin-left:40px;">
		<tr>
			<td width="14%">
				<b>Search by:</b>
				<?php
				$fieldsArray              = array(
				''				                => 'Select',
				'Testimonial.author'      => 'Author',
				'Testimonial.keyword'     => 'Keyword',
				'Testimonial.type'        => 'Type',
				'Testimonial.description' => 'Description'
				);
				echo $form->select("Testimonial.fieldName",$fieldsArray,$search1,array("id"=>"searchBy","label"=>false,"style"=>"width:200px","class"=>"styledselect","empty"=>false),false); ?>
			</td>
			<td width="20%">
				<b>Search value:</b><br/>
				<?php
				$display1   = "display:none";
				$display2   = "display:none";
				if($search1 != "Testimonial.status"){
					$display1 = "display:block";
				}else{
					$display2 = "display:block";
				}
					echo $form->input("Testimonial.value1",array("id"=>"search_input","class"=>"top-search-inp","style"=>"width:200px;$display1", "div"=>false, "label"=> false,"value"=>$search2));
				?>
			</td>
			<td width="40%"><br/>
		  		<?php
				echo $form->button("Search", array('class'=>'form-search','id'=>'search','onclick'=>'setSubmitMode(this.id)'))."&nbsp;&nbsp;&nbsp;";
				echo $form->button("Reset",array('type'=>'button','class'=>"form-reset",'div'=>false,'onclick'=>"location.href='".BASE_URL."admin/testimonials/list'"));				
				?>
			</td>
		</tr>
	</table>
		<br/>
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a> </th>
					<th class="table-header-repeat line-left minwidth-1"  width="24%"><?php echo $paginator->sort('Author', 'Testimonial.author');?></th>
					<th class="table-header-repeat line-left minwidth-1"  width="16%"><?php echo $paginator->sort('Type', 'Testimonial.type');?></th>
					<th class="table-header-repeat line-left minwidth-1"  width="20%"><?php echo $paginator->sort('Keyword', 'Testimonial.keyword');?></th>
					<th class="table-header-repeat line-left minwidth-1"  width="30%"><?php echo $paginator->sort('Description', 'Testimonial.description');?></th>
					<th class="table-header-repeat line-left" width="10%"><?php echo $paginator->sort('Modified', 'Testimonial.modified');?></th>
					<th class="table-header-options line-left" width="12%"><a href="#A">Options</a></th>
				</tr>
				<?php if(count($resultData)>0){
			$i = 1;
			foreach($resultData as $result):
		if(!$result['Testimonial']['status']%2)$class = "alternate-row"; else $class = "";  ?>
				<tr class="<?php echo $class; ?>">
					<td><input  type="checkbox" name="IDs[]" value="<?php echo $result['Testimonial']['id'];?>"/></td>
					<td><?php echo $result['Testimonial']['author']; ?></td>
					<td><?php echo ucfirst($result['Testimonial']['type']); ?></td>
					<td><?php echo $result['Testimonial']['keyword']; ?></td>
					<td><?php echo nl2br($result['Testimonial']['description']); ?></td>
					<td><?php echo date(DATE_FORMAT, strtotime($result['Testimonial']['modified'])); ?></td>
					<td class="options-width" align="center">
						<?php
						echo $html->link("",
						array('controller'=>'testimonials','action'=>'add',$result['Testimonial']['id']),
						array('class'=>'icon-1 info-tooltip','title'=>'Edit')
					);
						?>
						<?php
						echo $html->link("",
						array('controller'=>'testimonials','action'=>'list','delete',$result['Testimonial']['id']),
						array('class'=>'icon-2 info-tooltip delete','title'=>'Delete')
					);
						?>
					</td>
				</tr>
				<?php $i++ ;
				endforeach; ?>
				<?php } else { ?>
		<tr>
			<td colspan="10" class="no_records_found">No records found</td>
		</tr>
			<?php } ?>
				</table>
				<!--  end product-table................................... --> 
			</div>
			<!--  end content-table  -->
		
			<!--  start actions-box ............................................... -->
			<div id="actions-box">
				<a href="" class="action-slider"></a>
				<div id="actions-box-slider">					
					<?php echo $form->submit("Activate",array("div"=>false,"class"=>"action-activate","name"=>"publish",'onclick' => "return atleastOneChecked('Activate selected records?');")); ?>
					<?php echo $form->submit("Deactivate",array("div"=>false,"class"=>"action-deactivate","name"=>"unpublish",'onclick' => "return atleastOneChecked('Deactivate selected records?');")); ?>
				</div>
				<div class="clear"></div>
			</div>
			<!-- end actions-box........... -->			
			<!--  start paging..................................................... -->
			<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
			<tr>
			<td>
				<?php echo $paginator->prev('� Previous', array('class' => 'page-left'), null, array('class' => 'page-left')); ?>
				<div id="page-info"><?php echo $this->Paginator->counter(array('format' => ' Page<strong> %page%</strong> / %pages%',"id"=>"page-info")); ?></div>
				<?php echo $paginator->next('Next �', array('class' => 'page-right'), null, array('class' => 'page-right')); ?>
			</td>
			</tr>
			</table>
			<!--  end paging................ -->			
			<div class="clear"></div>           
	</td>
	<td>                                    
	<!--  start related-activities -->
	<div id="related-activities">
	<?php $user = $session->read("SESSION_ADMIN"); ?>
		<!--  start related-act-top -->
		<div id="related-act-top">
		<?php echo $html->image(BASE_URL."images/forms/header_related_act.gif", array("alt"=>"Edit",'width'=>"271", 'height'=>"43")); ?>
		</div>
		<!-- end related-act-top -->
		
		<!--  start related-act-bottom -->
		<div id="related-act-bottom">
		
			<!--  start related-act-inner -->
			<div id="related-act-inner">				
				<div class="left"><a href=""><?php $html->image(BASE_URL."images/forms/icon_edit.gif", array("alt"=>"Edit",'width'=>"21",'height'=>"21"))?></a></div>
				<div class="right">
					<h5>Testimonials Management</h5>
         This Section is used by Admin and Sales only to Manage Testimonials. 
          <div class="lines-dotted-short"></div>
					<ul class="greyarrow">
  					<li>
            <?php 
            echo $html->link("Add New Testimonial",
            array('controller'=>'testimonials','action'=>'add')
            );	
            ?>
            </li> 
  					<li>
            <?php echo $html->link("Download Search Result : Excel",
            array('controller'=>'testimonials','action'=>'exportci','onclick'=>'return false;')
            );	
            ?>
            </li>
  					<li>
            <?php echo $html->link("Download Search Result : PDF",
            array('controller'=>'testimonials','action'=>'download')
            );	
            ?>
            </li>
  					<li>
            <?php echo $html->link("Download Odesk : Excel",
            array('controller'=>'testimonials','action'=>'exportci/odesk')
            );	
            ?>
            </li>
  					<li>
            <?php echo $html->link("Download Odesk : PDF",
            array('controller'=>'testimonials','action'=>'download/odesk')
            );	
            ?>
            </li>
  					<li>
            <?php echo $html->link("Download Elance : Excel",
            array('controller'=>'testimonials','action'=>'exportci/elance')
            );	
            ?>
            </li>
  					<li>
            <?php echo $html->link("Download Elance : PDF",
            array('controller'=>'testimonials','action'=>'download/elance')
            );	
            ?>
            </li>     
  					<li>
            <?php echo $html->link("Download Other : Excel",
            array('controller'=>'testimonials','action'=>'exportci/other')
            );	
            ?>
            </li>
  					<li>
            <?php echo $html->link("Download Other : PDF",
            array('controller'=>'testimonials','action'=>'download/other')
            );	
            ?>
            </li>
						
					</ul>
				</div>
				<div class="clear"></div>
			</div>
			<!-- end related-act-inner -->
			<div class="clear"></div>
		
		</div>
		<!-- end related-act-bottom -->
	
	</div>
	<!-- end related-activities -->

</td>
</tr>
</table>                  
<div class="clear"></div>
</div>
<?php echo $form->end(); ?>
<!--  end content-table-inner  -->