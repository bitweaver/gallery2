{strip}
{if $packageMenuTitle}<a class="dropdown-toggle" data-toggle="dropdown" href="#"> {tr}{$packageMenuTitle}{/tr} <b class="caret"></b></a>{/if}
<ul class="{$packageMenuClass}">
{section loop=$menuLinks name=menu}
<li><a class="item" href="{$menuLinks[menu].url}">{tr}{$menuLinks[menu].text}{/tr}</a></li>
{/section}
</ul>
{/strip}
