<?php include 'include/header.php'; 

$sqlOfSelectedMenu      = 'SELECT * FROM `MenuDetails` WHERE `id`='.$_GET['menuID'];
$queryOfSelectedMenu    = mysqli_query($conn,$sqlOfSelectedMenu);
$rowOfSelectedMenu      = mysqli_fetch_assoc($queryOfSelectedMenu);

$sqlOfVendor            = 'SELECT * FROM `Vendorlist` WHERE `id`='.$rowOfSelectedMenu['vendorId'];
$queryOfVendor          = mysqli_query($conn,$sqlOfVendor);
$rowOfVendor            = mysqli_fetch_assoc($queryOfVendor);

$sqlOfAllCategory = 'SELECT * FROM `MenuCategory`';
$queryOfAllCategory     = mysqli_query($conn,$sqlOfAllCategory);

?>
<script type="text/javascript">
function errorcheck(inputType,inputName)
{
    if (inputType.value == null || inputType.value == "")
        $("input[name="+inputName+"]").addClass('error');
    else 
        $("input[name="+inputName+"]").removeClass('error');
}
function errorcheckdropdown(inputType,inputName)
{
    if (inputType.value == null || inputType.value == "")
        $("select[name="+inputName+"]").addClass('error');
    else 
        $("select[name="+inputName+"]").removeClass('error');
}
function validateForm() {
    
    var Name        = document.forms["addmenu"]["Name"];
    var Price       = document.forms["addmenu"]["Price"];
    var type        = document.forms["addmenu"]["type"];
    var description = document.forms["addmenu"]["description"];
    var categories  = document.forms["addmenu"]["categories"];
    
    errorcheck(Name,'Name');
    errorcheck(Price,'Price');
    errorcheckdropdown(type,'type');
    errorcheckdropdown(categories,'categories');
    
    
    if($("input,select").hasClass('error'))
        return false;
}
var specialKeys = new Array();
specialKeys.push(8); //Backspace
function IsNumeric(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1 || keyCode == 46 || keyCode == 9);
            return ret;
        }

</script>
<body>
    <div class="container_12">
        <?php include 'include/subheader.php'; ?>
        <div class="clear">
        </div>
        <?php include 'include/navpanel.php'; ?>
        <div class="clear">
        </div>
        <?php include 'include/sidepanel.php'; ?>
        <div class="grid_10">
            <div class="box round first fullpage">
            <h2><label><?php echo $rowOfVendor['vendorName']; ?></label> : <i>Update Menu</i></h2>
                <div class="block ">
                    <form name="addmenu" action="post.php" method="POST" onsubmit="return validateForm()">
                    
                    <input type="hidden" name="menuId" value="<?php echo $_GET['menuID'];?>" />
                    <table class="form">
                        <tr>
                            <td class="col1">
                                <label>Name</label>
                            </td>
                            <td class="col2">
                                <input type="text" name="Name" value="<?php echo $rowOfSelectedMenu['menuName'] ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Price</label>
                            </td>
                            <td>
                                <input type="text" name="Price" onkeypress="return IsNumeric(event);" onpaste="return false;" ondrop = "return false;" value="<?php echo $rowOfSelectedMenu['menuPrice'] ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Type</label>
                            </td>
                            <td>
                                <select name="type">
                                    <option value="">Select</option>
                                    <option <?php echo ($rowOfSelectedMenu['menuType'] == 'hot')? 'selected="selected"':''; ?> value="hot">Hot</option>
                                    <option <?php echo ($rowOfSelectedMenu['menuType'] == 'cold')? 'selected="selected"':''; ?> value="cold">Cold</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Description</label>
                            </td>
                            <td>
                                <textarea name="description"><?php echo $rowOfSelectedMenu['menuDescription'] ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Categories</label>
                            </td>
                            <td>
                                <select name="categories">
                                <option value="">select</option>
                                <?php while($rowOfAllCategory = mysqli_fetch_assoc($queryOfAllCategory)) { ?>
                                <option <?php echo ($rowOfAllCategory['id'] == $rowOfSelectedMenu['menuCategoryId'])? 'selected="selected"':''; ?> value="<?php echo $rowOfAllCategory['id'] ?>"><?php echo $rowOfAllCategory['categoryName'] ?></option>
                                <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button class="btn btnfloat" name="submit" value="sumbitForUpdateMenuToVendor">Save</button>
                                <a class="customBackButton" href="javascript:history.go(-1)">Back</a>
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="clear">
    </div>
    <div id="site_info">
        <p>
            Copyright <a href="#">wowcafe.in Admin</a>. All Rights Reserved.
        </p>
    </div>
</body>
</html>