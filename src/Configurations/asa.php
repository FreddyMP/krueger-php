<?php
//Plugin en captured tab
/*
if ($_POST['info_Date_Captured']=='')
putFieldInfo("info","","Date_Captured",array("fieldType"=>"text","value"=>date('Ymd')),"1");

//Pestaña captura

$sql="select activities_fields.Object_Name, activities_subtype_conf.F_Visible, activities_subtype_conf.F_Mandatory, activities_subtype_conf.F_Modificable, activities_subtype_conf.Default_Value from (activities_subtype_conf inner join activities_fields on activities_subtype_conf.Code_Field_Conf = activities_fields.Code_Field_Conf) inner join activities_head on activities_subtype_conf.Code_Subactivity=activities_head.Code_SubType and activities_subtype_conf.Code_Type=activities_head.Code_Type where activities_head.Code='".$_POST['key']."' and activities_fields.Type='C'";
$results=getFromSQL($sql);
if($results!="")
{
    for($i=0;$i<count($results);$i++) {
        if ($results[$i]['F_MODIFICABLE']=='1')
        $readonly='0';
        else
        $readonly='1';
        
        $sql="select core_bun_modules_fields.Code_FieldType from core_bun_modules_fields inner join core_bun_modules on core_bun_modules_fields.Code_Module=core_bun_modules.Code where core_bun_modules_fields.Label='".$results[$i]['OBJECT_NAME']."' and core_bun_modules.Name='Activities'";
        $results2=getFromSQL($sql);
        
        putFieldInfo("info","",$results[$i]['OBJECT_NAME'],array("fieldType"=>$results2[0]['CODE_FIELDTYPE'],"required"=>$results[$i]['F_MANDATORY'],"readOnly"=>$readonly,"active"=>$results[$i]['F_VISIBLE'],"value"=>$results[$i]['DEFAULT_VALUE']),"1");
        }
}
*/


//NUevo codigo para ocultar los campos no configurados
/**
 * plg_activities_antesformulario_old.php
*Configurar como se ven los campos
*Antes de mostrar formulario
*version original
*Modify By: Ivan M. Garcia Date: 19-12-2022; LastChange: 01-03-2023
*/


//Verifica si el Responsable tiene o no Organizacion de Venta asignada
$Vendedor=$_POST['info_Code_Seller'];
if(isset($Vendedor))
{
    $sql="select count(Code_Sales_Org) as CNT from users_organizations_sellers where Code_Seller='".$Vendedor."'";
    $result=getFromSQL($sql,0,0);
    $CNT=$result[0]['CNT'];
    if($CNT==0)
    {
        alert("El Responsable, no tiene Organizacion de Venta asignada, favor verificar...");
    }

}



//Si ya existe la actividad
if($_POST["key"])   
{
$codActivity = $_POST["key"];
    $sSQL = "SELECT Code_Source FROM activities_head WHERE Code='$codActivity' and Delete_Date is null";
    $codSource = getFromSQL($sSQL,0,0);
    if($codSource=="P")
    {
        putButton("","Replicar Actividad","images/monitorOK.gif","activity_replicate()",2);
    }
        
}

//Se agrega los parametros de los campos que debe tener el modulo activo, segun la configuracion --Ivan M. Garcia; Date: 06-04-2023

$sql="select activities_fields.Object_Name, activities_subtype_conf.F_Visible, activities_subtype_conf.F_Mandatory, activities_subtype_conf.F_Modificable
, D_Num_Attends, activities_subtype_conf.Default_Value 
from (activities_subtype_conf inner join activities_fields on activities_subtype_conf.Code_Field_Conf = activities_fields.Code_Field_Conf) 
inner join activities_head on activities_subtype_conf.Code_Subactivity=activities_head.Code_SubType and activities_subtype_conf.Code_Type=activities_head.Code_Type 
where activities_head.Code='".$_POST['key']."' ";
$results=getFromSQL($sql);
for($i=0;$i<count($results);$i++) {
if ($results[$i]['F_MODIFICABLE']=='1')
$readonly='0';
else
$readonly='1';

$sql="select core_bun_modules_fields.Code_FieldType from core_bun_modules_fields inner join core_bun_modules on core_bun_modules_fields.Code_Module=core_bun_modules.Code where core_bun_modules_fields.Label='".$results[$i]['OBJECT_NAME']."' and core_bun_modules.Name='Activities'";
$results2=getFromSQL($sql);

putFieldInfo("info","",$results[$i]['OBJECT_NAME'],array("fieldType"=>$results2[0]['CODE_FIELDTYPE'],"required"=>$results[$i]['F_MANDATORY'],"readOnly"=>$readonly,"active"=>$results[$i]['F_VISIBLE'],"value"=>$results[$i]['DEFAULT_VALUE']),"1");
}