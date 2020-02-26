<?php
/**
 * Template right sidebar archive
 * @package WordPress
 * @subpackage Emanon_Pro
 * @since Emanon Pro 1.0
 */
?>
<!--content-->
<div class="content">
	<div class="container">
		<?php emanon_archive_breadcrumb(); ?>
		<!--main-->
		<main>
			<div class="col-main clearfix">
				<div class="archive-title">
					<h1><span>患者様の声</span></h1>
				</div>
				<div class="archive-description">
					<p>患者さんに書いて頂いた感想文が少しずつ貯まりまして、やっと一つのページとして形にできるようになりました。<br>
						感想文を書いてくださった皆さま、本当にありがとうございます。<br>
						こちらで紹介させて頂きます。</p>
					<p>※また以下の3つの分野につきまして、患者様の写真や感想文をまとめた特集ページを作りました。そちらもぜひご覧いただければと思います。</p>
					<ul>
						<li>【<a href="https://yurari-chiro.com/voice-headache/" title="頭痛薬を飲む必要がなくなった患者さんのページ" id="pink"> 頭痛薬を飲む必要がなくなった患者さんのページ </a>】</li>
						<li>【<a href="https://yurari-chiro.com/voice-autonomic_imbalance/" title="自律神経の失調が改善した患者さんのページ" id="pink"> 自律神経の失調が改善した患者さんのページ </a>】</li>
						<li>【<a href="https://yurari-chiro.com/voice-sciatica/" title="坐骨神経痛が改善した患者さんのページ" id="pink"> 坐骨神経痛が改善した患者さんのページ </a>】</li>
					</ul>
				</div>
				<?php
				$name = 'archive';
				get_template_part( 'content', $name );
				?>
			</div>
		</main>
		<!--end main--> 
		<!--sidebar-->
		<aside class="col-sidebar sidebar">
			<?php get_sidebar(); ?>
		</aside>
		<!--end sidebar-->
	</div>
</div>
<!--end content--> 
