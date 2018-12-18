<?php

if(isset($_GET['search-box'])) {
    echo "<script>window.location = '../Views/Search.php?value=" . $_GET['search-box'] ."'</script>";
} else {
    // do all search
    echo "empty";
}

?>