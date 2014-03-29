/*- - - - - - - - - - - - - - - - - - - - -  - - - - - - - - - - - - - - - - -\
|                               mozInnerHTML                                  |
|- - - - - - - - - - - - - - - - - - - - -  - - - - - - - - - - - - - - - - - |
|                         Created by Erik Arvidsson                           |
|                  (http://webfx.eae.net/contact.html#erik)                   |
|                      For WebFX (http://webfx.eae.net/)                      |
|- - - - - - - - - - - - - - - - - - - - -  - - - - - - - - - - - - - - - - - |
|                  An emulation of innerHTML etc for Mozilla                  |
|- - - - - - - - - - - - - - - - - - - - -  - - - - - - - - - - - - - - - - - |
|                  Copyright (c) 2001 - 2010 Erik Arvidsson                   |
|- - - - - - - - - - - - - - - - - - - - -  - - - - - - - - - - - - - - - - - |
| Licensed under the Apache License, Version 2.0 (the "License"); you may not |
| use this file except in compliance with the License.  You may obtain a copy |
| of the License at http://www.apache.org/licenses/LICENSE-2.0                |
| - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - |
| Unless  required  by  applicable law or  agreed  to  in  writing,  software |
| distributed under the License is distributed on an  "AS IS" BASIS,  WITHOUT |
| WARRANTIES OR  CONDITIONS OF ANY KIND,  either express or implied.  See the |
| License  for the  specific language  governing permissions  and limitations |
| under the License.                                                          |
\- - - - - - - - - - - - - - - - - - - - -  - - - - - - - - - - - - - - - - -*/

HTMLElement.prototype.innerHTML setter = function (str) {
	var r = this.ownerDocument.createRange();
	r.selectNodeContents(this);
	r.deleteContents();
	var df = r.createContextualFragment(str);
	this.appendChild(df);

	return str;
}

HTMLElement.prototype.outerHTML setter = function (str) {
	var r = this.ownerDocument.createRange();
	r.setStartBefore(this);
	var df = r.createContextualFragment(str);
	this.parentNode.replaceChild(df, this);
	return str;
}


HTMLElement.prototype.innerHTML getter = function () {
	return getInnerHTML(this);
}

function getInnerHTML(node) {
	var str = "";
	for (var i=0; i<node.childNodes.length; i++)
		str += getOuterHTML(node.childNodes.item(i));
	return str;
}

HTMLElement.prototype.outerHTML getter = function () {
	return getOuterHTML(this)
}

function getOuterHTML(node) {
	var str = "";

	switch (node.nodeType) {
		case 1: // ELEMENT_NODE
			str += "<" + node.nodeName;
			for (var i=0; i<node.attributes.length; i++) {
				if (node.attributes.item(i).nodeValue != null) {
					str += " "
					str += node.attributes.item(i).nodeName;
					str += "=\"";
					str += node.attributes.item(i).nodeValue;
					str += "\"";
				}
			}

			if (node.childNodes.length == 0 && leafElems[node.nodeName])
				str += ">";
			else {
				str += ">";
				str += getInnerHTML(node);
				str += "<" + node.nodeName + ">"
			}
			break;

		case 3:	//TEXT_NODE
			str += node.nodeValue;
			break;

		case 4: // CDATA_SECTION_NODE
			str += "<![CDATA[" + node.nodeValue + "]]>";
			break;

		case 5: // ENTITY_REFERENCE_NODE
			str += "&" + node.nodeName + ";"
			break;

		case 8: // COMMENT_NODE
			str += "<!--" + node.nodeValue + "-->"
			break;
	}

	return str;
}


var _leafElems = ["IMG", "HR", "BR", "INPUT"];
var leafElems = {};
for (var i=0; i<_leafElems.length; i++)
	leafElems[_leafElems[i]] = true;
