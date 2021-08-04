<!DOCTYPE HTML>>
<html>
	<head>
		<title>Results</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<script language="javascript">
function initcon()
{	newwin();
	setHeight();
	document.fmhome.treg.value = "";
	document.fmhome.dobd.value="";
	document.fmhome.dobm.value="";
	document.fmhome.doby.value="";
	document.fmhome.treg.focus();

}
function setHeight()
{
	if(screen.height == '600')
	{
		document.getElementById('headtd').height='100px';
		document.getElementById('spantd').style.height='188px';
		document.getElementById('tblmain').width='600px';
	}
	else
	{
		document.getElementById('headtd').height='104px';
		document.getElementById('spantd').style.height='320px';
		document.getElementById('tblmain').width='780px';
	}
}
function newwin()
{
if (self != top) 
top.location.href="dominic.htm";
}
function IsNumeric(sText)
{
   var ValidChars = "0123456789";
   var IsNumber=true;
   var Char;

   for (i = 0; i < sText.length && IsNumber == true; i++) 
      { 
      Char = sText.charAt(i); 
      if (ValidChars.indexOf(Char) == -1) 
         {
         IsNumber = false;
         }
      }
   return IsNumber;
   
 }

function checkform()
{
  if(document.fmhome.treg.value == "")
  {
   	alert("Enter Register number");
	document.fmhome.treg.value = "";
	document.fmhome.treg.focus();
   return false;
  }
  if ((document.fmhome.treg.value.length != 7) && (document.fmhome.treg.value.length != 5))
  {
    alert("Enter valid Registration number");
	document.fmhome.treg.value = "";
	document.fmhome.treg.focus();
	return false;
  }
  if(IsNumeric(document.fmhome.treg.value)==false)
  {
	alert("Please enter some valid Registration number");
	document.fmhome.treg.value = "";
	document.fmhome.treg.focus();
	return false;

  }
  dob=document.fmhome.dobd.value+"/"+document.fmhome.dobm.value+"/"+document.fmhome.doby.value;
	if(!/^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/.test(dob))
	{
        alert('Enter valid Date : DD-MM-YYYY');                 
		document.fmhome.dobd.value="";
		document.fmhome.dobm.value="";
		document.fmhome.doby.value="";
		document.fmhome.dobd.focus();
		return false;
    }
}

function resetContents()
{
	document.fmhome.treg.value = "";
	document.fmhome.dobd.value = "";
	document.fmhome.dobm.value = "";
	document.fmhome.doby.value = "";
	document.getElementById("showres").innerHTML='';
}

function NavigateAjax(regno)
{
	if(checkform() != false)
	{
		document.getElementById("showres").innerHTML="<table width='100%' ><tr><td align='center'><img src='atom01.gif' style='border:0px'/></table></tr></td>";
		xmlHttp=GetXmlHttpObject()
		if (xmlHttp==null)
		{
		alert ("Browser does not support HTTP Request")
		return
		}
		if((regno > 10000  ) && (regno < 1925351 ))
		{
			var url="dominic.asp?treg="+regno+"&dob="+dob;
			url=url+"&sid="+Math.random();
			xmlHttp.onreadystatechange=stateChanged ;
			xmlHttp.open("GET",url,true);
			xmlHttp.send(null);	
		}
		else
		{
			alert ("Please enter valid Registration number");
			location.href="dominic.htm";
		} 
		
	}
	else
	{
		return false;
	}
}


function stateChanged() 
{ 
	//if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	if (xmlHttp.readyState==4 &&  xmlHttp.status==200)
	{ 
	document.getElementById("showres").innerHTML="";
	document.getElementById("showres").innerHTML=xmlHttp.responseText
	document.getElementById("ctrltr").style.display='none';
	document.getElementById("lnktd").style.display='';
	} 
}  
function enableCheckAnoRes()
{
	document.getElementById("ctrltr").style.display='';
	document.getElementById("lnktd").style.display='none';
	document.getElementById("showres").innerHTML="";
	document.fmhome.treg.value = "";
	document.fmhome.dobd.value="";
	document.fmhome.dobm.value="";
	document.fmhome.doby.value="";
	document.fmhome.treg.focus();
}
function GetXmlHttpObject(handler)
{ 
	var objXMLHttp=null
	if (window.XMLHttpRequest)
	{
	objXMLHttp=new XMLHttpRequest()
	}
	else if (window.ActiveXObject)
	{
	objXMLHttp=new ActiveXObject("Microsoft.XMLHTTP")
	}
	return objXMLHttp
}
function CallPrint(strid)	// print fn
{

var printHead = "<style type=text/css>td{font-family: verdana ; font-size:13px;background-color:white;color:#173951;text-align:center;}.hide_print {display: none;} a{display: none;}</style><TABLE cellpadding='0' cellspacing='0' border='0' style='WIDTH: 488px;border:2px solid #bdc2a9;'><TR><TD colSpan='2' align='left' bgcolor='#ffffff'><br><TABLE cellSpacing='2' cellPadding='0' border='0' height='240' style='BACKGROUND:#bdc2a9;WIDTH:600px;'></TABLE>";


var prtContent = document.getElementById(strid);
var strOldOne=prtContent.innerHTML;

var WinPrint = window.open('','','left=0,top=0,width=1px,height=1px,toolbar=0,scrollbars=1,status=0');
WinPrint.document.write(printHead+prtContent.innerHTML);
//var tb=document.getElementById('print_image');

WinPrint.document.close();

WinPrint.focus();
WinPrint.print();
WinPrint.close();
}

function movetoNext(current, nextFieldID) 
{
	if (current.value.length >= current.maxLength) 
	{
		document.getElementById(nextFieldID).focus();
	}
}
		</script>
		<STYLE> <!--
		D { background-color: #93008E ; color: ffffff ; font-family: verdana ; font-size: 13px }
.L { background-color: #A95B97 ; color: ffffff ; font-family: verdana ; font-size: 13px }
.R{ background-color:#996633; color:#3333FF; font-family:verdana ;
 font-size:13px}
.r1{ background-color:#CDCDCD; color:#000040;font-family:verdana ; font-size:13px}
.r2{ background-color:#DEDEEF; color:#000040;font-family:verdana ; font-size:13px}
.r3{ background-color:#CFCFE7; color:#000040;font-family:verdana ; font-size:13px}
.r4{ background-color:#BBBBDD; color:#000040;font-family:verdana ; font-size:13px}
.Y { color: e9ef45 }
.S { font-size: 12px }
.sch {font-size: 10;font-weight:normal }
.hdg {font-family:'Trebuchet MS, Verdana';background:xnavy;}
.hdg1 {font-family:'Trebuchet MS, Verdana';background:white;color:navy;}
.hdg21 {font-family:'Trebuchet MS, Verdana';background:white;color:navy;}
.mark {background:#DAE4ED;color:navy;}
.mark2 {background:#C2D3E2;color:navy;}
.Btn1 {font-family:verdana;font-size:12px; COLOR:#ffffff; BACKGROUND-COLOR:#6699FF;border:1px solid #3366CC}


	td{font-family: verdana ; font-size:13px;}
	a.hov:link { color: blue; text-decoration:none; }
	a.hov:active { color: blue; text-decoration:none; }
	a.hov:visited { color: #660033;#CC00CC; text-decoration:none; }
	a.hov:hover { xcolor: blue; font-weight:bold;text-decoration:none; }
	a.lnkchkAno:link { color: #660000;font-weight:bold;font-size:13px; font-family:verdana; text-decoration:none; background:#cdcdcd}
	a.lnkchkAno:active { color: #660000;font-weight:bold;font-size:13px; font-family:verdana; text-decoration:none; background:#cdcdcd }
	a.lnkchkAno:visited { color: #660000;font-weight:bold;font-size:13px; font-family:verdana; text-decoration:none; background:#cdcdcd }
	a.lnkchkAno:hover { color: #0000ff;font-weight:bold;font-size:13px; font-family:verdana; text-decoration:none; background:#cdcdcd}
	
	.dob { width:25px;border:1px solid #6699FF;font-family:verdana;font-size:11px;}
	--></STYLE>
	</head>
	<body onLoad="initcon()" onFocus="setHeight()" xbottommargin="0" leftmargin="0" rightmargin="0"
		topmargin="3" bgcolor="#cdd6e0">
		<form name="fmhome" onSubmit="NavigateAjax(treg.value);return false;">
			<table id="tblmain" align="center" bgcolor="#ffffff" border="0" style="COLOR:#3333FF;	#660000">
				<tr xvalign="middle">
					<td id="headtd" align="center" width="780" xheight="90" bgcolor=#b1c5ea background="vhsebg.gif">
                        <table>
                            <tr>
                            	<td style=" font-family:trebuchet ms;font-size: 22px;color:#103852 " align="center">Government of Tamilnadu</td>
                            </tr>
                            <tr>
                            	<td style="font-family:trebuchet ms;font-size: 22px;color:#08008c" align="center">
                                Dominic Savio Higher Secondary school Tirupattur Examination Results - <font style="font-size:30px;font-weight:bold">
                                </font>                        
                            	</td> 
                            </tr>
                        </table>						
					</td>
				</tr>
				<tr align="center">
					<td xheight="300">
						<table align="center" border="0" style="WIDTH:100%">
							<tr id="ctrltr">
								<td width="25%" align="right">
									Roll Number
								</td>
								<td width="20%" align="center">
                                	<input title='Enter 7 or 5 Digit Roll Number' type="text" onKeyUp="movetoNext(this, 'dobd')" id="treg" name="treg" maxlength="7" style="FONT-WEIGHT: bold; FONT-SIZE: 12px; xBACKGROUND: #cdcdcd; WIDTH: 97px; COLOR: #3333FF;#660000; FONT-FAMILY: verdana; TEXT-ALIGN: center;border: 1px solid #6699FF">
								</td>
								<td align="left">                                
                                 Date of Birth <input type="text" onKeyUp="movetoNext(this, 'dobm')" id="dobd" name="dobd" class="dob" maxlength="2" title="Day as DD">-<input type="text" name="dobm" id="dobm" class=dob maxlength=2 onKeyUp="movetoNext(this, 'doby')"  title="Month as MM">-<input type=text id="doby" name=doby class=dob maxlength=4 title="Year as YYYY"style="width:35px">&nbsp;&nbsp;&nbsp;
                                	<input type="button" name="bsubmit" value="Submit" onClick="return NavigateAjax(treg.value)" class=Btn1>&nbsp;
									<input type="button" value=" Reset " name="breset" onClick="resetContents()" class=Btn1>
                                </td>
							</tr>
							<tr>
								<td colspan="3" align="right">
                                    <a href="swr_dominic.htm">
                                    	<img src=schoolwise.gif border=0 width=24px title="School Wise Results">
                                    </a>&nbsp;&nbsp;&nbsp;&nbsp;
                                </td>
							</tr>
							<tr id="lnktd" style="DISPLAY:none">
								<td colspan="3" align="center"><a href="javascript:void enableCheckAnoRes()" class="lnkchkAno">&nbsp;&nbsp;CHECK ANOTHER RESULT&nbsp;&nbsp;</a>
									<span class="hide_print">
										<div id="" style="visibility:hidden;text-align:right;width:460px;">
                               <A HREF="javascript:void CallPrint('tblmain')" title="Print Result" >
                                            	<img src="print.gif" style="border:0px solid" />
                                            </A>
                                        </div>										
									</span>								
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td id="spantd" height="320">
						<span id="showres" valign="top" style="WIDTH: 100%; HEIGHT: 100%; BACKGROUND-COLOR: transparent; TEXT-ALIGN: center"></span>
					</td>
				</tr>
				<tr>
					<td id="footertd" align="center" height="70" background="vhsebg.gif" xbgcolor="#305876" style="color:#1D3252">
						Data Provided By Directorate of <A class=hov HREF="https://www.facebook.com/dominicsaviohsschooltpt">Dominic savio  Higher Secondary school</A>, Kerala.
						<br>
						DOMINIC SAVIO HIGHER SECONDARY SCHOOL, TIRUPATTUR.<br>
						<br>
						<div style="font-face:verdana;font-size:11px;color:#0F3D6A;text-align:justify">
                        	<U>Disclaimer</U>:  DOMINIC SAVIO HIGHER SECONDARY SCHOOL, TIRUPATTUR Education is responsible for any inadvertent error that may have crept in the results being published on net.Dominic Savio Higher Secondary School, Tirupattur Vellore any news results.
						</div>
					</td>					
				</tr>
			</table>
		</form>


	</body>
</html>
