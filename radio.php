<script>
function ShowHideDiv() {
        var chkYes = document.getElementById("chkYes");
        var dvtext = document.getElementById("dvtext");
        if(chkYes.checked == true){
        dvtext.style.display = "block";
        }
        else{
        dvtext.style.display = "none";

        }
    }
    </script>
<label for="chkYes">
    <input type="radio" id="chkYes" name="chk" onclick="ShowHideDiv()" />
    Yes
</label><br/>
<label for="chkNo">
    <input type="radio" id="chkNo" name="chk" onclick="ShowHideDiv()" />
    No
</label><br/>
<div id="dvtext" style="display: none">
    Text Box:
    <input type="text" id="txtBox" />
</div>