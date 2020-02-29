let array = [2, 3, 5, 7, 11, 13, 17, 19, 23, 29];

const randomize = (num) =>{
    let arr = [];
    let count = 0;
    let jumlah = 0;
    let randomNum;
    while (count<num) {
        randomNum = array[Math.floor(Math.random() * 9)];
        jumlah += randomNum;
        arr.push(randomNum);
        count++;
    }
    
    return `deret array:${arr.toLocaleString()}\njumlah:${jumlah}`
}
console.log(randomize(8))