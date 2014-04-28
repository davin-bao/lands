<?php
/**
 * Created by PhpStorm.
 * User: davin.bao
 * Date: 14-4-28
 * Time: 下午4:27
 */
	$presenter = new Illuminate\Pagination\BootstrapPresenter($paginator);
?>

<?php if ($paginator->getLastPage() > 1): ?>
  <ul class="pagination pagination-sm inline">
    <?php echo $presenter->render(); ?>
  </ul>
<?php endif; ?>
