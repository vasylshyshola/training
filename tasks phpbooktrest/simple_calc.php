<?php
if($_SERVER['REQUEST_METHOD'] =='POST'){
    process_form(count_form());
}else{
    show_form();
}


function show_form(){
    print <<<_HTML
    <form method="post" action="$_SERVER[PHP_SELF]">
    <input type="number" name="first_num" step="any">
    <select name="operation">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select>
    <input type="number" name="second_num" step="any">
    <input type="submit" value="=">

    </form>

_HTML;

}
function process_form($count){
    print $count['result'];

}
 function count_form() : array{
    $operand = array();
    $operand['first_num'] = $_POST['first_num'];
    $operand['second_num'] = $_POST['second_num'];
    $operand['operation'] = $_POST['operation'];

    //if((!is_int($operand['first_num'])  || !is_double($operand['first_num'])) || (!is_int($operand['second_num'])  || !is_double($operand['second_num']))){
       //$operand['result']= "Numbers must be integer or floating point";


    //}else{

        if($operand['operation'] ==='+'){
            $res = $operand['first_num'] + $operand['second_num'];
            $operand['result'] = "expression result : $operand[first_num] $operand[operation] $operand[second_num] = $res.";

        }elseif($operand['operation'] ==='-'){
            $res = $operand['first_num'] - $operand['second_num'];
            $operand['result'] = "expression result : $operand[first_num] $operand[operation] $operand[second_num] = $res.";

        }elseif($operand['operation'] ==='*'){
            $res = $operand['first_num'] * $operand['second_num'];
            $operand['result'] = "expression result : $operand[first_num] $operand[operation] $operand[second_num] = $res.";

        }elseif($operand['operation'] ==='/'){
            $res = $operand['first_num'] - $operand['second_num'];
            $operand['result'] = "expression result : $operand[first_num] $operand[operation] $operand[second_num] = $res.";

        }
    //}


    return $operand;
 }