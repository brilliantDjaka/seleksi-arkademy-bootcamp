const deretBilangan = (num) =>{
    if(typeof num != "number" || num < 1)return 'argumen harus bilangan bulat positif';
    let arr = [num];
    let now = num;
    while (arr[arr.length -1] != 1) {
        now= arr[arr.length-1];
        if(now == 1) break;
        else if (now%2 == 0) arr.push(now/2);
        else arr.push((now * 3) + 1)
    }
    return `array deret:${arr.toLocaleString()}\njumlah: ${arr.length}`;
}
console.log(deretBilangan(13));