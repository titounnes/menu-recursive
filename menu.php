<link rel="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" type="text/css" />
<style>
li{
    list-style-type: none; 
}
</style>
<?php
$data = array(
     array(
        'id'=>1,
        'label'=>'menu 1',
    ),
     array(
        'id'=>10,
        'label'=>'menu 1-0',
    ),
    array(
        'id'=>101,
        'data'=>'data1',
        'label'=>'menu 1-0-1',
    ),
    array(
        'id'=>102,
        'data'=>'data2',
        'label'=>'menu 1-0-2',
    ),
    array(
        'id'=>11,
        'label'=>'menu 1-1',
    ),
    array(
        'id'=>2,
        'data'=>'data 3',
        'label'=>'menu 2',
    ),
    array(
        'id'=>3,
        'label'=>'menu 3',
     ),
    array(
        'id'=>30,
        'data'=>'data4',
        'label'=>'menu 3-0',
    ),
);


    function menu_tree($array, $parent=0, $curr=0, $prev=-1)
    {
        foreach($array as $value)
        {    
            if(strlen($value['id'])==1)
            {
                $xparent=0;
            }
            else
            {
                $xparent=substr($value['id'], 0,strlen($value['id'])-1);
            }
            if($parent==$xparent)
            {
                if($curr>$prev)
                {
                    if($xparent==0)
                    {
                        echo '<ul class="sidebar-menu">';
                    }
                    else
                    {
                        echo '<ul class="treeview-menu" id="menu_'.$xparent.'">';
                    }
                }
                if($curr=$prev)
                {
                    echo '</li>';
                }
                if(!isset($value['data']) || $value['data']=='')
                {
                    echo '<li class="treeview" ><a href="#" list-target="menu_'.$value['id'].'"';
                }
                else
                {
                    echo '<li ><a href="#'.$value['data'].'" ';
                }
                echo '>'.$value['label'];
                echo '</a>';
                if($curr>$prev)
                {
                    $prev=$curr;
                }  
                $curr++;
                menu_tree($array,$value['id'],$curr,$prev);
                $curr--;
            }
        }
        if($curr==$prev)
        {
            echo "</li></ul>";
        }
    }

menu_tree($data);
