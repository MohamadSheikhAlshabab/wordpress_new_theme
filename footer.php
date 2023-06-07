<footer>
    <span>
        <?php
        numbering_pagination();
        ?>
    </span>
    <span>
        <span>
            copyright &copy; <?php echo date('Y'); ?>
        </span>
        <span>
            <?php bloginfo('name'); ?>
        </span>
    </span>
</footer>
<?php wp_footer(); ?>
</body>

</html>