<link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/jquery-easyui/themes/icon.css">
<link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/jquery-easyui/themes/black/easyui.css">
<link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/jquery-easyui/themes/color.css">
<script type="text/javascript" src="<?=base_url();?>assets/jquery-easyui/jquery.easyui.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/jeasyui-custom.js"></script>

<div id="cc" class="easyui-layout">  
	<div data-options="region:'center'" border="false">
		<div class="easyui-layout" data-options="fit:true">  
			<div data-options="region:'center'" border="false">
				<table id="grid" style='height:100%; width:100%;' toolbar="#tb"></table>
				<div id="tb" style="padding:7px">  
					<div>  
						<input id="ss" class="easyui-searchbox" style="width:300px" data-options="searcher:goFilter, prompt:'Search...',menu:'#mm'"></input>
					</div> 
				</div>
				<div id="mm" style="width:120px">  
					<div data-options="name:'ALL',iconCls:'icon-ok'">ALL</div>  
					<div data-options="name:'code'">CODE</div>  
					<div data-options="name:'name'">NAME</div>  
				</div> 
			</div>  
		</div>  
	</div>  
</div>

<div id="dlg" class="easyui-window" data-options="width:465, height:550, closed:true, cache:false, modal:true">
	<form id="forms" method="post" autocomplete="off" style="width:100%; height:100%">
		<input type="hidden" id="id" name="id" />
		<input type="hidden" id="code" name="code" />
		<div class="easyui-layout" data-options="fit:true">
			<div data-options="region:'center',border:false" style="padding-top:10px;">
				<div class="group_box width_440">
					<div class="easyui-panel" title="GENERAL" style="width:auto;height:auto;padding:10px;">
						<table class="input_form">
							<tr>
								<td><label for="company_id">Company</label></td> 	
								<td><input class="easyui-combogrid" id="company_id" name="company_id" data-options="
									url:'<?php echo site_url('systems/get_company');?>',
									required:true, panelWidth:300, panelHeight:200, idField:'id', textField:'name', mode:'remote', 
									rownumbers:true, fitColumns:true, 
									columns: [[
										{field:'id',title:'ID',width:50,sortable:true,hidden:true},
										{field:'code',title:'CODE',width:70,sortable:true},
										{field:'name',title:'NAME',width:150,sortable:true}
									]]" /></td>
							</tr>
							<tr>
								<td><label for="branch_id">Branch</label></td> 	
								<td><input class="easyui-combogrid" id="branch_id" name="branch_id" data-options="
									url:'<?php echo site_url('systems/get_branch');?>',
									required:true, panelWidth:300, panelHeight:200, idField:'id', textField:'name', mode:'remote', 
									rownumbers:true, fitColumns:true, 
									columns: [[
										{field:'id',title:'ID',width:50,sortable:true,hidden:true},
										{field:'code',title:'CODE',width:70,sortable:true},
										{field:'name',title:'NAME',width:150,sortable:true}
									]]" /></td>
							</tr>
							<tr>
								<td><label for="department_id">Department&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></td> 	
								<td><input class="easyui-combogrid" id="department_id" name="department_id" data-options="
									url:'<?php echo site_url('systems/get_department');?>',
									required:true, panelWidth:300, panelHeight:200, idField:'id', textField:'name', mode:'remote', 
									rownumbers:true, fitColumns:true, 
									columns: [[
										{field:'id',title:'ID',width:50,sortable:true,hidden:true},
										{field:'code',title:'CODE',width:70,sortable:true},
										{field:'name',title:'NAME',width:150,sortable:true}
									]]" /></td>
							</tr>
							<tr>
								<td><label for="code_new">Code</label></td> 	
								<td><input class="easyui-validatebox" id="code_new" name="code_new" style="width:100%;" data-options="required:true" /></td>
							</tr>
							<tr>
								<td><label for="name">Name</label></td> 		
								<td><input class="easyui-validatebox" id="name" name="name" style="width:100%;" data-options="required:true" /></td>
							</tr>
							<tr>
								<td><label for="prefix_code1">Prefix 1 - 2</label></td> 			
								<td>
									<input class="easyui-validatebox" id="prefix_code1" name="prefix_code1" style="width:49.5%;" data-options="required:false" />
									<input class="easyui-validatebox" id="prefix_code2" name="prefix_code2" style="width:50%;" data-options="required:false" />
								</td>
							</tr>
							<tr>
								<td><label for="prefix_code3">Prefix 3 - 4</label></td> 			
								<td>
									<input class="easyui-validatebox" id="prefix_code3" name="prefix_code3" style="width:49.5%;" data-options="required:false" />
									<input class="easyui-validatebox" id="prefix_code4" name="prefix_code4" style="width:50%;" data-options="required:false" />
								</td>
							</tr>
							<tr>
								<td><label for="prefix_code5">Prefix 5 - 6</label></td> 			
								<td>
									<input class="easyui-validatebox" id="prefix_code5" name="prefix_code5" style="width:49.5%;" data-options="required:false" />
									<input class="easyui-validatebox" id="prefix_code6" name="prefix_code6" style="width:50%;" data-options="required:false" />
								</td>
							</tr>
							<tr>
								<td><label for="separator">Separator</label></td> 			
								<td><input class="easyui-validatebox" id="separator" name="separator" style="width:49.5%;"  data-options="required:false" /></td>
							</tr>
							<tr>
								<td><label for="number_digit">Digit Num</label></td> 			
								<td><input class="easyui-validatebox" id="number_digit" name="number_digit" style="width:49.5%;"  data-options="required:false" /></td>
							</tr>
							<tr>
								<td><label for="sign1">Sign 1</label></td> 			
								<td><input class="easyui-validatebox" id="sign1" name="sign1" style="width:100%;" data-options="required:false" /></td>
							</tr>
							<tr>
								<td></td> 			
								<td><input class="easyui-validatebox" id="sign1_title" name="sign1_title" style="width:100%;" data-options="required:false" /></td>
							</tr>
							<tr>
								<td><label for="sign2">Sign 2</label></td> 			
								<td><input class="easyui-validatebox" id="sign2" name="sign2" style="width:100%;" data-options="required:false" /></td>
							</tr>
							<tr>
								<td></td> 			
								<td><input class="easyui-validatebox" id="sign2_title" name="sign2_title" style="width:100%;" data-options="required:false" /></td>
							</tr>
							<tr>
								<td><label for="sign3">Sign 3</label></td> 			
								<td><input class="easyui-validatebox" id="sign3" name="sign3" style="width:100%;" data-options="required:false" /></td>
							</tr>
							<tr>
								<td></td> 			
								<td><input class="easyui-validatebox" id="sign3_title" name="sign3_title" style="width:100%;" data-options="required:false" /></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
			<div data-options="region:'south',border:false">
				<div style="height:100%; width:100%; border-top:1px solid #cfcfcf;">
					<table style="height:100%; width:100%; border-collapse:collapse; border-spacing:0;">
						<tr>
							<td>
								<center>
									<table style="border-collapse:collapse; border-spacing:0;">
										<tr>
											<td style="padding:4px; white-space:nowrap;">
												<a href="#" id="btn_save" onclick="btn_save()" class="easyui-linkbutton c8" data-options="plain:false">&nbsp;&nbsp;&nbsp;Save&nbsp;&nbsp;&nbsp;</a>
											</td>  		
											<td style="padding:4px; white-space:nowrap;">
												<a href="#" id="btn_save_new" onclick="btn_save(1)" class="easyui-linkbutton c8" data-options="plain:false">&nbsp;&nbsp;&nbsp;Save & New&nbsp;&nbsp;&nbsp;</a>
											</td>  		
											<td style="padding:4px; white-space:nowrap;">
												<a href="#" id="btn_save_next" onclick="btn_save(2)" class="easyui-linkbutton c8" data-options="plain:false">&nbsp;&nbsp;&nbsp;Save & Next&nbsp;&nbsp;&nbsp;</a>
											</td>  		
										</tr>
									</table>
								</center>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</form>
</div>

<script>
	var url;
	
	$(function(){
		resizelayout();
		$(window).resize(resizelayout);
	});
	
	function goFilter( value, name ) {
		if(typeof(value)==='undefined') value = "";
		if(typeof(name)==='undefined') name = "";
	
		$('#grid').datagrid('load',{  
			findKey: name,
			findVal: value
		});
		
	}
	
	// NEXT TO LOAD (THIS VALUE CAN BE CHANGE)
	$(function(){  
	
		$(document).on("keydown", function(e){ 
			switch(e.keyCode){
			case 27:	// esc
				$('#dlg').dialog('close');
				break;
			}
		});
	});
	
	//	GRID ======
	$(function(){  
		$("#grid").datagrid({        
			url:'<?php echo site_url('systems/setup_documents/r')?>',	
			columns:[[
				{field:"company_code", title:'COMP', width:50, sortable:true},
				{field:"branch_code", title:'BRCH', width:50, sortable:true},
				{field:"department_code", title:'DEPT', width:50, sortable:true},
				{field:"code", title:'CODE', width:100, sortable:true},
				{field:"name", title:'NAME', width:150, sortable:true},
				{field:"prefix_code1", title:'PREFIX CODE 1', width:110, sortable:true},
				{field:"prefix_code2", title:'PREFIX CODE 2', width:110, sortable:true},
				{field:"prefix_code3", title:'PREFIX CODE 3', width:110, sortable:true},
				{field:"prefix_code4", title:'PREFIX CODE 4', width:110, sortable:true},
				{field:"prefix_code5", title:'PREFIX CODE 5', width:110, sortable:true},
				{field:"prefix_code6", title:'PREFIX CODE 6', width:110, sortable:true},
				{field:"separator", title:'SEPR', width:50, sortable:true},
				{field:"number_digit", title:'DIGIT', width:50, sortable:true},
				{field:"revision_code", title:'REV', width:50, sortable:true},
				{field:"sign1", title:'SIGN1', width:250, 
					formatter:function( value, rowData, rowIndex ){
						return ((rowData.sign1)?rowData.sign1:"") + ((rowData.sign1_title)?" / "+rowData.sign1_title:"");
					} 
				},
				{field:"sign2", title:'SIGN2', width:250, 
					formatter:function( value, rowData, rowIndex ){
						return ((rowData.sign2)?rowData.sign2:"") + ((rowData.sign2_title)?" / "+rowData.sign2_title:"");
					} 
				},
				{field:"sign3", title:'SIGN3', width:250, 
					formatter:function( value, rowData, rowIndex ){
						return ((rowData.sign3)?rowData.sign3:"") + ((rowData.sign3_title)?" / "+rowData.sign3_title:"");
					} 
				},
				{field:'id', title:'ID', width:50, sortable:true, formatter:greyField}
			]],
			// title:'',
			fit:true,
			rownumbers:true,
			singleSelect:true,
			pagination:true,
			pagePosition:'bottom',
			pageNumber:1, pageSize:50, pageList:[50,100],
			idField:'id', sortName: 'company_code, branch_code, department_code, code', sortOrder: "asc", multiSort: true,
			onDblClickRow: function(rowIndex, rowData) { crud('u') }
		});

		$('#grid').datagrid('getPager').pagination({  
			buttons:[{  
				text:'<?php echo l('form_btn_create');?>',
				iconCls:'icon-add',  
				handler:function(){ crud('c') }  
			},{  
				text:'<?php echo l('form_btn_update');?>',
				iconCls:'icon-edit',  
				handler:function(){ crud('u') }  
			},{  
				text:'<?php echo l('form_btn_delete');?>',
				iconCls:'icon-remove',  
				handler:function(){ crud('d') }  
			}]  
		});           

		setKeyTrapping_grid('#grid', 'crud');
	})

	function crud ( mode, target ) {
		if(typeof(target)==='undefined') target = "";
		
		url = "<?php echo site_url('systems/setup_documents');?>/"+mode;

		if ( mode=='c' ) {
			var is_allow = <?php echo (is_allow('c', 'systems', 'setup_documents'))?1:0; ?>;
			if ( !is_allow ) {
				dhtmlx.alert({title:"<?php echo l('notification');?>", type:"alert-error", text:"<?php echo l('permission_failed_crud');?>"});
				return false;
			}
			
			$('#forms').form('reset'); 
			
			$('#dlg').window({title: "<?php echo l('form_create');?>"}).window('open');
			$('#forms #btn_save_new').show();
			$('#forms #btn_save_next').hide();
		}
		
		if ( mode=='u' ) {
			var is_allow = <?php echo (is_allow('u', 'systems', 'setup_documents'))?1:0; ?>;
			if ( !is_allow ) {
				dhtmlx.alert({title:"<?php echo l('notification');?>", type:"alert-error", text:"<?php echo l('permission_failed_crud');?>"});
				return false;
			}
			
			var row = $('#grid').datagrid('getSelected');   
			if (!row)
				return;

			$('#forms').form('reset'); 
			$('#forms').form('load',row); 
		
			$('#dlg').window({title: "<?php echo l('form_update');?>"}).window('open');
			$('#forms #btn_save_new').hide();
			$('#forms #btn_save_next').show();
			
			$('#forms #code_new').val(row.code); 
			$('#forms #code_new').focus(); 
		}
		
		if ( mode=='d' ) {
			var is_allow = <?php echo (is_allow('d', 'systems', 'setup_documents'))?1:0; ?>;
			if ( !is_allow ) {
				dhtmlx.alert({title:"<?php echo l('notification');?>", type:"alert-error", text:"<?php echo l('permission_failed_crud');?>"});
				return false;
			}
			
			var row = $('#grid').datagrid('getSelected');  
			if (!row)
				return false;
				 
			dhtmlx.confirm({ title:"<?php echo l('confirm');?>", type:"confirm-warning", width:"350px", text:"<?php echo l('confirm_delete');?>", callback: function(r){  
				if (r){  
					$.post(url,{id:row.id},function(result){  
						if (result.success){  
							$('#grid').datagrid('reload');    // reload the user data  
							dhtmlx.message("<?php echo l('success_delete');?>");
						} else {  
							dhtmlx.alert({ title:"<?php echo l('notification');?>", type:"alert-error", text:result.errorMsg });
						}  
					},'json');  
				}}  
			});  
		}

	}
	
	function btn_save( save_option ) {  
		if(typeof(save_option)==='undefined') save_option = 0;
		
		var dlg = $('#dlg');
		var forms = $('#forms');
		var grid = $('#grid');
		var crud = 'crud';
		
		forms.form('submit',{  
			url: url,  
			onSubmit: function(param){  
				return $(this).form('validate'); 
			},  
			success: function(result){  
				var result = eval('('+result+')');  
				if (result.errorMsg){  
					dhtmlx.alert({ title:"<?php echo l('notification');?>", type:"alert-error", text:result.errorMsg });
				} else {  
					dlg.dialog('close');      // close the dialog  
					grid.datagrid('reload');    // reload the user data  
					if (save_option==1) 
					{
						window[crud]('c');
					}
					else if (save_option==2)
					{
						var lastIndex = grid.datagrid('getRows').length-1;
						var selected = grid.datagrid('getSelected');
						if (selected){
							var index = grid.datagrid('getRowIndex', selected);
							if (index==lastIndex) return
							grid.datagrid('selectRow', index+1);
							window[crud]('u');
						}
					}	
					dhtmlx.message("<?php echo l('success_saving');?>");
				}  
			}  
		});  
	} 

</script>
