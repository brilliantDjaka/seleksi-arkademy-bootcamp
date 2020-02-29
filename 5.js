let triangle = (jumlahBaris) => {
    
    for (let i = 0; i <= jumlahBaris; i++) {
        for (let j = jumlahBaris - i; j > 0; j--) {
            process.stdout.write(" "); 
        }
        for (let j = 0; j < i; j++) {
            process.stdout.write("*"); 
        }
        process.stdout.write("\n");
    }
}

triangle(5)