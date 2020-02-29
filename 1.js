const soal1 = (name,age) =>{
    if(typeof name !=  "string" || typeof age != "number" ) return Error;
    return {
        name,
        age,
        address:'Jl Irian jaya nomor 10, Malang',
        hobbies:['Watching youtube','Piano','Watching movies','Code','Cycling'],
        is_married:false,
        list_school:[
            {
                name:'SMK Telkom Malang',
                year_in:2017,
                year_out:null,
                major:'Programming'
            },
            {
                name:'SMPN1 Madiun',
                year_in:2014,
                year_out:2017,
                major:null
            }
        ],
        skills:[
            {
                'skill_name':'Restify',
                'level':'Advanced'
            },
            {
                'skill_name':'NoSQL(MongoDB)',
                'level':'Expert'
            },
            {
                'skill_name':'SQL(MySQL,PostgreSQL)',
                'level':'Beginner'
            },
            {
                'skill_name':'Flutter',
                'level':'Advanced'
            },
            {
                'skill_name':'Laravel',
                'level':'Beginner'
            },
            {
                'skill_name':'Linux environment',
                'level':'Advanced'
            }
        ],
        interest_in_coding:true
    }
};

console.log(soal1('Brilliant Djaka Irfanuddin Rofiq',18))
