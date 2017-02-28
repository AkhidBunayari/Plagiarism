var _Action_Debug       = false;
var _Debug              = false;
var _General_Debug      = false;
var _GeneralSize_Debug  = true;

function replaceAll(src, des, str) {
    return str.replace(new RegExp(src, 'g'), des);
}

// Convert string to string array with separator
function toArray(str, separator, ignores)
{
    res = [];
    idx = -1;
    tmp = "";

    if (str.length > 0 && separator !== undefined)
        while (true) {
            if ((idx = str.indexOf(separator)) !== -1) {
                tmp = str.substring(0, idx).trim();

                if (Contains(tmp, ignores))
                    res.push(tmp);
                else
                    if(tmp !== "" && tmp !== " ")
                        res.push(tmp);                

                str = str.substring(idx + 1);
            }
            else {
                if (str.length > 0)
                    res.push(str.trim());

                break;
            }
        }
    
    if (_Debug || _General_Debug) {
        console.log("Array length : " + res.length);
        console.log("Array values : " + res.toString());
    }

    return res;
}

function Contains(ele, array) {
    if (array !== undefined)
    {
        l = array.length;
        for (var e = 0; e < l; e++)
            if(array[e] === ele)
                return true;
    }
    return false;
}