const secretKey = ['a', 'd', 'm', 'i', 'n'];
const secretKeyCode = [65, 68, 77, 73, 78];

let secretKeyCodeStatus = new Array(secretKeyCode.length).fill(0);

const CORRECT_STATUS = 1;// 表示正確匹配按鍵的狀態

document.onkeydown = function(event) {
    let correctCodeIndex = secretKeyCodeStatus.lastIndexOf(CORRECT_STATUS);
    correctCodeIndex = correctCodeIndex === -1 ? 0 : correctCodeIndex + 1;

    if (correctCodeIndex > secretKeyCode.length) {
        location.replace("login/SignIn/admin.html");
        return true;
    }

    if (event.keyCode === secretKeyCode[correctCodeIndex]) {
        console.log('keyCode: ' + event.keyCode + ' code: ' + event.code + '--correct,index:' + correctCodeIndex);
        if (correctCodeIndex + 1 === secretKeyCodeStatus.length) {
            //alert('');
            location.replace("login/SignIn/admin.html");
            secretKeyCodeStatus = new Array(secretKeyCode.length).fill(0);
            return true;
        }
        else {
            secretKeyCodeStatus[correctCodeIndex] = CORRECT_STATUS;
        }
    } 
    else {
        console.log('keyCode: ' + event.keyCode + ' code: ' + event.code + '--reset');        
        secretKeyCodeStatus = new Array(secretKeyCode.length).fill(0);
    }
};