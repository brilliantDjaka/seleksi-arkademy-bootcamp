let triangle = (jumlahBaris) => {
    let segitigaString = '';
    for (let i = 0; i <= jumlahBaris; i++) {
        for (let j = jumlahBaris - i; j > 0; j--) {
            segitigaString += ' '; 
        }
        for (let j = 0; j < i; j++) {
           segitigaString += '*';
        }
        segitigaString += '\n';
    }
    return segitigaString;
}

console.log(triangle(5));