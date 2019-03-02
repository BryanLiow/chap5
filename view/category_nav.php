
        <nav>
            <ul>
                <!-- display links for all categories -->
                <?php foreach($categories as $category) : ?>
                <li>
                    <a href="?category_id=<?php 
                              echo $category['category_id']; ?>">
                        <?php echo $category['category_name']; ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>

