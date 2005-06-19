{strip}
<ul>
{section loop=$menuLinks name=menu}
<li><a class="item" href="{$menuLinks[menu].url}">{tr}{$menuLinks[menu].text}{/tr}</a></li>
{/section}
</ul>
{/strip}
