<?php 

    $stmt1 = $conn->prepare("SELECT * FROM section_home");
    $stmt1->execute();
    $row1 = $stmt1->fetch(PDO::FETCH_ASSOC);

    $stmt2 = $conn->prepare("SELECT * FROM section_about");
    $stmt2->execute();
    $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
    
    $stmt3 = $conn->prepare("SELECT * FROM section_icons");
    $stmt3->execute();
    $row3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
    
    $stmt4 = $conn->prepare("SELECT * FROM section_products");
    $stmt4->execute();
    $row4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);

    $stmt5 = $conn->prepare("SELECT * FROM section_reviews");
    $stmt5->execute();
    $row5 = $stmt5->fetchAll(PDO::FETCH_ASSOC);

    $stmt6 = $conn->prepare("SELECT * FROM section_footer");
    $stmt6->execute();
    $row6 = $stmt6->fetchAll(PDO::FETCH_ASSOC);

?>