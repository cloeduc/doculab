<?php
/**
 * @package doculab
 */
?>
    </div> <!-- End of content wrapper -->
</div> <!-- End of content -->
<footer id="footer">
    <div class="wrapper">
        <?php if(!is_404()) get_sidebar('footer'); ?>
        <div id="footer-credits">
        <p>
		Sauf indication contraire explicite, les textes de la plateforme de documentation du FacLab sont placés dans le domaine public vivant grâce à la licence CC-0.
		<br />Toute copie, diffusion, modification, etc... est encouragée et sera considérée comme un compliment.
		</p>
        </div>
    </div>
</footer>
<a href="<?php echo get_admin_url();?>" id="contribuer" title="Documenter !"><span class="genericon-plus"></span>  <span class="txt"> Documenter </span></a>
<a id="scroll-up" href="javascript:void(0)"><span class="genericon-uparrow"></span></a>
<?php wp_footer(); ?>
</body>
</html>