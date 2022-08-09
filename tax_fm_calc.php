<html>
    <head>
        <title>tax calculator</title>  
        <meta charset="UTF-8">
    </head>
    <body>
        <form action="" method="post">
            <label for="sales_amount"><b>1年間の売上金額</b></label>
            <input type="text" name ="sales_amount"><br><br>
            <label for = "expenses"><b>1年間の経費・仕入金額</b></label>
            <input type="text" name="expenses"><br><br>

            <input type="submit" value="計算する"><br><br>
        </form>

        <?php
        $fmt = numfmt_create('ja_JP', NumberFormatter::CURRENCY);

        $sales_amount = $_POST['sales_amount'];
        if(empty($_POST['sales_amount'])){
            exit('売上が未入力です。');
        }

        $expenses = $_POST['expenses'];
        if(empty($_POST['expenses'])){
            exit('経費・仕入金額が未入力です。');
        }

        $income_amount = $sales_amount - $expenses;
        $income_tax = number_format($income_tax);

        echo ("売上金額:");
        print numfmt_format_currency($fmt, $sales_amount, 'JPY') . "\n";
        echo '<br>';
        echo ("経費・仕入金額:");
        echo numfmt_format_currency($fmt, $expenses, 'JPY') . "\n";
        echo '<br>';

        switch ($income_amount) {
            // 所得金額が195万円以下
            case $income_amount <= 1950000;
            $tax_rate = 5;
            echo ("税率:" . $tax_rate . "パーセント" ); 
            echo '<br>';
            $income_tax = $income_amount * ($tax_rate / 100);
            echo ("所得税:");
            echo numfmt_format_currency($fmt, $income_tax, 'JPY');
            echo '<br>';
            break;

            // 所得金額195万円超え～330万円以下
            case $income_amount > 1950000 && $income_amount <= 3300000;
            $tax_rate = 10;
            echo ("税率: " . $tax_rate . "パーセント" ); 
            echo '<br>'; 
            $income_tax = $income_amount * ($tax_rate / 100);
            echo ("所得税: ");
            echo numfmt_format_currency($fmt, $income_tax, 'JPY');
            echo '<br>';
            break;

            // 所得金額330万円超え～695万円以下
            case $income_amount > 3300000 && $income_amount <= 6950000;
            $tax_rate = 20;
            echo ("税率: " . $tax_rate . "パーセント" ); 
            echo '<br>'; 
            $income_tax = $income_amount * ($tax_rate / 100);
            echo ("所得税: ");
            echo numfmt_format_currency($fmt, $income_tax, 'JPY');
            echo '<br>';
            break;

            // 所得金額695万円超え～900万円以下
            case $income_amount > 6950000 && $income_amount <= 9000000;
            $tax_rate = 23;
            echo ("税率: " . $tax_rate . "パーセント" ); 
            echo '<br>'; 
            $income_tax = $income_amount * ($tax_rate / 100);
            echo ("所得税: ");
            echo numfmt_format_currency($fmt, $income_tax, 'JPY');
            echo '<br>';
            break;

            // 所得金額900万円超え～1,800万円以下
            case $income_amount > 9000000 && $income_amount <= 18000000;
            $tax_rate = 33;
            echo ("税率: " . $tax_rate . "パーセント" ); 
            echo '<br>'; 
            $income_tax = $income_amount * ($tax_rate / 100);
            echo ("所得税: ");
            echo numfmt_format_currency($fmt, $income_tax, 'JPY');
            echo '<br>';
            break;
    
            // 所得金額1,800万円超え
            case $income_amount > 18000000;
            $tax_rate = 40;
            echo ("税率: " . $tax_rate . "パーセント" ); 
            echo '<br>';
            $income_tax = $income_amount * ($tax_rate / 100);
            echo ("所得税: ");
            echo numfmt_format_currency($fmt, $income_tax, 'JPY');
            echo '<br>';
            break;
        } 

        ?>
        
    </body>
</html>
