<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("Location: login_session.php");
    exit;
}

$images = [
    "1" => "https://images.squarespace-cdn.com/content/v1/5eb2849d26fd4038ca1058c6/1588757669556-MFWQ8W73P1ITHK4CLKJD/Stocksy_txp824ffa5crXt000_Original_845128.jpg?format=2500w'",
    "2" => 'https://archello.s3.eu-central-1.amazonaws.com/images/2018/10/11/Contemporary-Modern-House-Design-6.1539270983.8601.jpg',
    "3" =>  "https://www.viaggiaregratis.eu/wp-content/uploads/2020/10/Idee-regali-per-viaggiatori-originali.jpg",
    "4" =>  'https://images.squarespace-cdn.com/content/v1/5eb2849d26fd4038ca1058c6/1588757674395-NHUABF3TTR5DYVWPSVSE/image-asset%2B%25286%2529.jpg?format=1000w',
    "5" =>  "https://images.squarespace-cdn.com/content/v1/5eb2849d26fd4038ca1058c6/1588757662335-AAAZGCRZBJS7CYPD1N53/Stocksy_txp824ffa5crXt000_Original_845127.jpg?format=1000w",
    "6" =>  "https://images.squarespace-cdn.com/content/v1/5eb2849d26fd4038ca1058c6/1588757661739-DKWPF43CW5OZ5RYE50IY/Stocksy_txp824ffa5crXt000_Original_845117.jpg?format=1000w",
    "7" =>  "https://images.squarespace-cdn.com/content/v1/5eb2849d26fd4038ca1058c6/1588757674395-NHUABF3TTR5DYVWPSVSE/image-asset%2B%25286%2529.jpg?format=1000w",
    "8" =>  "https://images.squarespace-cdn.com/content/v1/5eb2849d26fd4038ca1058c6/1588757674143-TMWP6UMTWRSG8MEF402O/image-asset%2B%25286%2529.jpg?format=1000w"
];

echo json_encode($images);
?>