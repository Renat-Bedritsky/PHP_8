<div class="title">

    <h1>Furniture</h1>

</div>

<?php 

$dir = $_GET['dir'] ?? '.\\';   // Если 'dir' существует, то принимает 'dir', иначе \
$dir = realpath($dir);          // Абсолютный путь к файлу
chdir($dir);                    // Изменяет текущий каталог на указанный
function getProducts() {
    $ch = curl_init();

    $options = [
        CURLOPT_URL => "https://fakestoreapi.com/products",
        CURLOPT_RETURNTRANSFER => true
    ];

    curl_setopt_array($ch, $options);

    $result = curl_exec($ch);
    
    $errors = curl_errno($ch);
    
    if ($errors) {
        echo 'Errors ('.$errors.'): '.curl_error($ch);
    }
    else {
        return json_decode($result, true);
    }
}

function showProducts() {
    $data = getProducts();
    $html = '';
    foreach($data as $product) {
        $html .= '
        <div class="product">
            <a href="/index.php/?name='.$product['title'].'&image='.$product['image'].'&price='.$product['price'].'"><img src="'.$product['image'].'" alt="'.$product['title'].'"></a>
            <h3>'. $product['title'] .'</h3>
            <div class="product_price">$'.$product['price'].'</div>
        </div>';
    }
    if (!empty($html)) echo '<div class="products_list">'.$html.'</div>';
}

showProducts();




if (isset($_GET['name'])) { ?>
    <style>.product{display:none;}</style>
    <div class="thing">
        <?php 
        echo '<img src="'.$_GET['image'].'" alt="logo">';
        echo '<br>'.$_GET['name'].'<br>';
        echo '<br>'.$_GET['price'].'<br>';
        echo "<a href='/index.php/?name=".$_GET['name']."&image=".$_GET['image']."&price=".$_GET['price']." class='add_basket'>В корзину</a>";
        //addBasket();
        ?>
    </div>

<?php }

function addBasket() { ?>

<!-- <form class="add_basket" method="GET">
    <input type="hidden" name="basket" value="add">
    <button>В корзину</button>
</form> -->

<?php 

    // if (isset($_GET['basket'])) {
    //     setcookie('login', 'admin');
    // }
}

?>
