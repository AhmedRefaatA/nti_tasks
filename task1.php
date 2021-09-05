
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
thead{
    background-color: #dddddd;
}
</style>
<?php

$consumption = 151;

switch ($consumption) {

    //  First case 
    case ($consumption <= 50):
        $bill = $consumption * 3.5;
        echo 
            "<h2>Electricity bill</h2>
                <table>
                    <thead>
                        <th>Consumption</th>
                        <th>Slice</th>
                        <th>Amount</th>
                    </thead>
                    <tbody>
                        <td>$consumption units </td>
                        <td>firstSlice</td>
                        <td>$bill</td> 
                    </tbody>
                </table>";
        break;
    //  Second case 
    case ($consumption > 50 && $consumption <= 150):
        $firstSlice = 50 * 3.5;
        $secondSlice = ($consumption - 50) * 4;
        $bill = $firstSlice + $secondSlice;
        echo "<h2>Electricity bill</h2>
                <table>
                    <thead>
                        <th>Consumption</th>
                        <th>Slice</th>
                        <th>Amount</th>
                    </thead>
                    <tbody>
                        <td>$consumption units </td>
                        <td>secondSlice</td>
                        <td>$bill</td> 
                    </tbody>
                </table>";
        break;
    //  Last case 
    case ($consumption > 150):
        $firstSlice = 50 * 3.5;
        $secondSlice = 100 * 4;
        $lastSlice = ($consumption - 150) * 6.5;
        $bill = $firstSlice + $secondSlice + $lastSlice;
        echo "<h2>Electricity bill</h2>
                <table>
                    <thead>
                        <th>Consumption</th>
                        <th>Slice</th>
                        <th>Amount</th>
                    </thead>
                    <tbody>
                        <td>$consumption units </td>
                        <td>lastSlice</td>
                        <td>$bill</td> 
                    </tbody>
                </table>";
        break;
}




?>