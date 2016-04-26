{if count($posts) > 0}
	{foreach $posts as $post}
		<article class="row">
			<header class="medium-4 columns text-right">
				<h4>{$post.title.rendered}</h4>
			</header>
			<div class="medium-8 columns">
				<div class="callout">
					{$post.content.rendered}
				</div>
			</div>
		</article>
	{/foreach}
{else}
	<article class="row">
		<header class="columns text-center">
			<div class="callout">
				<h4>Nothing found.</h4>
				<p>You had one job...</p>
			</div>
		</header>
	</article>
{/if}
