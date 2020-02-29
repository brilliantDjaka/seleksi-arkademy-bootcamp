
const validateUsername = (username) => {
    
    if( !username.match(/(?=^.{5,8}$)(?=^\d.*\d$)(?=^.[a-z].+$)/)) 
        return false;
    let splitedUsername = username.split('');
    if(splitedUsername[0] != splitedUsername[splitedUsername.length - 1]) 
        return false;
    return true

}

const validatePassword = (password) => {
    if(!password.match(/(?=^.{7,11}$)(?=^[0-9a-z\-]+$)(?=.*\d+)(?=.*\-+)/))return false;
    let allNumber = password.match(/\d/g);
    let allWord = password.match(/[a-z]/g);
    if(allWord.length != allNumber.length) return false;
    
    return true;
}
console.log(validatePassword('jaka-1233'))