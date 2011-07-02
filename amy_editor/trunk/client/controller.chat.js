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
	var width = node.w()-20;
	var node_coll = node.a($$()).s('padding:8px;margin:4px;').w(width);
	var pane_index = -1;
	var label = '...';
	var ht = '<div style="margin-top:6px;padding:3px;background:#f0f0f0;-moz-border-radius:3px;-webkit-border-radius:3px;border:1px solid #ddd"><table cellspacing="0" width="95%"><tbody>';
	ht += '</tbody></table>THIS IS A SAMPLE CHAT SECTION</div>';
	node_coll.a($$()).t(ht);
	client.nodes.chatSection.v(true)
}

