let a=false
let index
const click=(id)=>{
a=true
index=id
}
{id===index && a?chưa thanh toán : đã thanh toán}
button onClick={(e)=>click(id)}


<?php
if($row['tttt']==1){
    echo '<script>
    <button disable> ĐÃ THANH TOÁN </button> 
    </script>'; 
}
else {
    echo '<script>
    <button> ĐÃ THANH TOÁN </button> 
    </script>';  
}
?>