// search_suggestions.php
<?php
$suggestions = [
    "apple",
    "banana",
    "cherry",
    "date",
    "elderberry",
    "fig",
    "grape",
    "honeydew",
    "kiwi",
    "lemon",
    "mango",
    "nectarine",
    "orange",
    "papaya",
    "quince",
    "raspberry",
    "strawberry",
    "tangerine",
    "ugli fruit",
    "watermelon"
];

if (isset($_GET['query'])) {
    $query = strtolower($_GET['query']);
    $results = array_filter($suggestions, function ($term) use ($query) {
        return strpos(strtolower($term), $query) !== false;
    });

    echo json_encode(array_values($results));
}
?>