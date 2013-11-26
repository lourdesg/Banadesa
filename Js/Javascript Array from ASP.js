<%
'  This code is hereby granted to the public domain.
'
' ** PrintJavascriptArray Documentation **
'
' Summary: PrintJavascriptArray is an optimized function that prints
'  a result set as a list of quoted and comma-separated entries, for
'  use in initializing client-side Javascript arrays.
'
' Parameters:
' objCN [in] - Connection string or opened connection object.
' strsql [in] - A query that retrieves the data to be printed
'
' Notes:
'   * Each value returned in the result set will become a single entry
'     in the array. (Returning multiple columns is okay.)
'   * Each entry will be double-quoted and treated as a string.
'   * Entries containing the double-quote character will be
'      handled correctly. (Replaced with String.fromCharCode.)
'   * Data will be HTML encoded.
'   * Nulls will be printed as empty strings.
'
' Usage:
'   <script type="text/javascript">
'      myJavascriptArray = Array(
'          <%  PrintJavascriptArray "DSN=MyDSN", _
'              "SELECT ObjectID, ObjectName FROM tblObjects"   %>
'         );
'   </script>
'

Function PrintJavascriptArray(ByRef objCN, strsql)
    Dim objRS, ArrayRecords, i, j
    Dim NumRows, NumColumns

    Set objRS = Server.CreateObject("ADODB.Recordset")
    objRS.Open strsql,objcn,adOpenForwardOnly,adLockReadOnly,adCmdText

    Do While Not objRS.EOF
        ArrayRecords = objRS.GetRows(50)

        NumRows = UBound(ArrayRecords,2)
        NumColumns = UBound(ArrayRecords,1)

        For i = 0 To NumRows
            For j = 0 To NumColumns
                Response.write Chr(34)
                If Not IsNull(ArrayRecords(j, i)) Then
                    Response.write Replace(ArrayRecords(j, i), _
                        Chr(34),Chr(34)&"+String.fromCharCode(34)+"&Chr(34))
                End If
                Response.write Chr(34)
                ' Print comma, except at last record
                If Not objRS.EOF Or i <> NumRows _
                    Or j <> NumColumns Then
                    Response.write ","
                End If
            Next
        Next
        Response.write vbCrLf
    Loop
    objRS.Close
    Set objRS = nothing
End Function

%>
