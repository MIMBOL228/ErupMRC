<!-- VK Widget -->
<script type="text/javascript" src="https://vk.com/js/api/openapi.js?168"></script>

<!-- VK Widget -->
<div id="vk_community_messages"></div>
<script type="text/javascript">
VK.Widgets.CommunityMessages("vk_community_messages", <?php echo $vk['id'];?>, {expandTimeout: "<?php echo $vk['sec'];?>000",tooltipButtonText: "Есть вопрос?"});
</script>