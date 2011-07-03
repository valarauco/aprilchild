/*
  *------------------------------------------------------------------------------------------
	== Amy Editor ==
	Collaborative Text and Source Code Editor for Developers

	Built on the technologies developed and maintained by April-Child.com
	Copyright (c)2007,2008 Petr Krontorad, April-Child.com.

	Author: Petr Krontorad, petr@krontorad.com

	All rights reserved.
  *------------------------------------------------------------------------------------------

	Collaboration controller support

  *------------------------------------------------------------------------------------------
*/

client.controller.messaging = {running:false, thread:null, types:['Unrecognized', 'Approve', 'Join', 'Notification', 'Chat', 'UserInfo']}

client.controller.renderChat = function(force)
{
	var node = client.nodes.chatSection;
	node.rc();
	var width = node.w()-2000;
	var height = node.h()-25;
	var node_coll = node.a($$()).s('padding:8px;margin:4px;').w(width);
	var pane_index = -1;
	var label = '...';
	var ht = '<div style="background:#f0f0f0;-moz-border-radius:3px;-webkit-border-radius:3px;border:1px solid #ddd">';
	ht += '<iframe height=';
	ht += height;
	ht +=' width=100%';
	//ht += width;
	ht += ' src="/blab_im/chat.php?u=1"> </div>';
	node_coll.a($$()).t(ht);
	client.nodes.chatSection.v(true)
}

