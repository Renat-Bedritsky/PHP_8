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
    $data = (array)$data;
    $html = '';
    foreach($data as $product) {
        $html .= '
        <div class="product">
            <a href="/index.php/?name='.$product['title'].'"><img src="'.$product['image'].'" alt="'.$product['title'].'"></a>
            <h3>'. $product['title'] .'</h3>
            <div class="product_price">$'.$product['price'].'</div>
        </div>';
        addProduct($product['title'], $product['image'], $product['price']);
    }
    if (!empty($html)) echo '<div class="products_list">'.$html.'</div>';
}

showProducts();

function addProduct($title, $image, $price) {
    if (isset($_GET['name'])) { 
        if ($_GET['name'] == $title) { ?>

            <style>.product{display:none;}</style>
            <div class="thing">
                <img src="<?= $image ?>" alt="logo">
                <div>
                    <p><?= $title ?></p>
                    <p><?= $price ?></p>
                    <form method="POST">
                        <input type="hidden" name="addBasket">
                        <button>В корзину</button>
                    </form>
                </div>
            </div>

            <?php 
            if (isset($_POST['addBasket'])) {
                $i = 1;
                $position = "position_$i";
                foreach ($_COOKIE as $key => $value) {
                    if ($position == $key) {
                        $i++;
                        // $position = "position_$i";
                    }
                }
                // else setcookie("$position", "$title", time()+1800);
            }
        }
    }
}
echo '<pre>';
var_dump($_COOKIE);
echo '/<pre>';