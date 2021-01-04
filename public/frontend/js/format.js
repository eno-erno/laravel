const Format_Rupiah_Final = (amount,format) => {
    let rupiah;
    let harga_diskon;
    if(typeof amount === 'string' && format){
        const format = Number(amount).toString().split('').reverse().join('');
        const convert = format.match(/\d{1,3}/g);
        rupiah = convert.join('.').split('').reverse().join('')
    }else if(typeof amount === 'number' && format){
        const format = Number(amount).toString().split('').reverse().join('');
        const convert = format.match(/\d{1,3}/g);
        rupiah = convert.join('.').split('').reverse().join('')
    } 
    else if(typeof amount === 'string'){
        const format = Number(amount).toString().split('').reverse().join('');
        const convert = format.match(/\d{1,3}/g);
        rupiah = 'Rp ' + convert.join('.').split('').reverse().join('')
    }
    else{
        const format = amount.toString().split('').reverse().join('');
        const convert = format.match(/\d{1,3}/g);
        rupiah = 'Rp ' + convert.join('.').split('').reverse().join('')
    }
    return rupiah
}