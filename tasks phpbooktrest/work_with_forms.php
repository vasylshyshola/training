<?php
if($_SERVER['REQUEST_METHOD'] =='POST'){
    process_form();
}else{
    show_form();

}

function process_form(){
print <<<_HTML
Your choice :<ul><li>$_POST[noodle]</li>
                   <li>$_POST[sweet]</li>
                   <li>Sweet Quantity: $_POST[sweet_q]</li></ul>
_HTML;

}





function show_form()
{
    print <<<_HTML
    <form method="POST" action="$_SERVER[PHP_SELF]">
    Braised Noodles with: <select name="noodle">
        <option>crab meat</option>
        <option>mushroom</option>
        <option>barbecued pork</option>
        <option>shredded ginger and green onion</option>
    </select><br/>
    Sweet: <select name="sweet" multiple>
        <option value="puff"> Sesame Seed Puff
        <option value="square"> Coconut Milk Gelatin Square
        <option value="cake"> Brown Sugar Cake
        <option value="rice_meat"> Sweet Rice and Meat
    </select><br/>
    Sweet Quantity: <input type="text" name="sweet_q"><br/>
    <input type="submit" name="submit" value="Order">
    </form>
_HTML;
}

