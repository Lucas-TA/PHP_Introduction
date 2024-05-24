<?php
    $current = basename($_SERVER['SCRIPT_FILENAME']);
    $links = [
        'Home' => 'index.php',
        'About'=> 'about.php',
        'Contact Us'=> 'contact.php',
        'Oz Blog'=> 'blog.php',
        'Animals'=> 'gallery.php',
        'Administration'=> 'admin.php',
    ];
    $a = '<li><a href="%s">%s</a></li>';
    $span = '<li><span>%s</span></li>';
    $ul = [];
    foreach ($links as $text => $href) {
        $ul[] = $href == $current
            ?sprintf($span, $text)
            : sprintf($a, $href, $text);
    }
    $ul = implode($ul);
?>
<nav>
    <ul>
        <?= $ul ?>
    </ul>
</nav>