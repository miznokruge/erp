	<!--  start content-table-inner -->
	<div id="content-table-inner">
	<?php echo $form->create('Testimonial',array('action'=>'add','method'=>'POST','onsubmit' => '',"class"=>"login")); ?>
	<?php $session->flash(); ?>
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
		<tr valign="top">
			<td>
	<!-- start id-form -->
	<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Author:</th>
			<td><?php
				 echo $form->input("author",array("class"=>"inp-form","label"=>false,"div"=>false));
            ?></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Type:</th>
			<td>	
			<?php
			
			 // Creating options for Type field
		   $options=array('odesk'    => 'Odesk', 
                      'elance'   => 'Elance',
                       'other'   => 'Other',
                      );
			echo $form->input("type",array('type'=>'select','options'=>$options,"class"=>"styledselect_form_1","label"=>false,"div"=>false));    
             ?>
			</select>
			</td>
			</td></td>
		</tr>
		<tr>
			<th valign="top">Description:</th>
			<td><?php
				 echo $form->input("description",array("class"=>"form-textarea","label"=>false,"div"=>false));
				 echo $form->hidden("id");
            ?></td>
		</tr>
    <tr>
    <th valign="top">Keyword:</th>
    <td><?php
    echo $form->input("keyword",array("class"=>"inp-form","label"=>false,"div"=>false));
    ?></td>
    <td></td>
</tr>
		<tr>
			<th>&nbsp;</th>
			<td valign="top">
			<?php echo $form->submit('Save',array('class'=>"form-submit",'div'=>false))."&nbsp;&nbsp;&nbsp;"; 
			echo $form->button('Cancel',array('type'=>'button','class'=>"form-reset",'div'=>false,'onclick'=>"location.href='".BASE_URL."admin/testimonials/list'")); 
			?>
			</td>
			<td></td>
		</tr>
	</table>
	<!-- end id-form  -->

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
					<h5>Testimonial Management</h5>
          This Section is used by Admin and Sales only to Manage Testimonials.
          <div class="lines-dotted-short"></div>
					<ul class="greyarrow">
  					<li>
            <?php 
            echo $html->link("Go To Listing",
            array('controller'=>'testimonials','action'=>'list')
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
	<!-- end id-form  -->
	<div class="clear"></div>
	</div>
	<!--  end content-table-inner  -->