<?php if(!isset($RUN)) { exit(); } ?>

<table>
    

<?php
$i = 0;
while($a3=xyz39zyx::xyz57zyx($a1_qst))
{
    ?>
    <tr>
        <td>
            <font face="tahoma" size="4"><?php echo $a3['question_text'] ?></font>
        </td>
    </tr>
    <tr>
        <td>
            <?php
                $a1_ans = $z3->xyz42zyx(xyz88zyx::xyz90zyx($a3['id'],$asg_id));
                $chart = new PieChart();
                $dataSet = new XYDataSet();                
                while ($a3_ans=xyz39zyx::xyz57zyx($a1_ans))
                {                    
                    $dataSet->addPoint(new Point($a3_ans['answer_text'], $a3_ans['a_count']));       
                }
                $chart->setDataSet($dataSet);
                $chart->setTitle("User agents for www.example.com");
                $chart->render("generated/".$i.".png");
            ?>
            <img src='<?php echo "generated/".$i.".png" ?>' style="border: 1px solid gray;" >
        </td>
    </tr>
   <?php
  $i++;
}

$z3->xyz61zyx();

?>

    </table>
