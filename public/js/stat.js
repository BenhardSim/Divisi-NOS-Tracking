    // grafik revenue vs cost

    const revvcost_main = document.getElementById('revenue_main').getContext('2d');
    //const labels = Utils.months({count: 7});
    const revvcost_mainData = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Des'],
        datasets: [
        {
        label: ['PS'],
        data: [120000, 50000, 75000, 22000, 12500, 55000, 40000, 100000, 110000, 120500, 140000, 125000],
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1
        },
        {
        label: ['RM'],
        data: [125000, 70000, 25000, 220000, 112500, 5000, 40000, 150000, 110000, 125500, 150000, 105000],
        fill: false,
        borderColor: 'rgb(255, 192, 192)',
        tension: 0.1
        }
    ]
    };
    const revvcost_mainConfig = {
        type: 'line',
        data: revvcost_mainData,
        options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
        }
    };

    new Chart(revvcost_main, revvcost_mainConfig);

    // site profit loss regional 

    const profitloss_main = document.getElementById('profitloss_main').getContext('2d');
    //const labels = Utils.months({count: 7});
    const profitloss_mainData = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Des'],
        datasets: [
        {
        label: ['PS'],
        data: [120000, 50000, 75000, 22000, 12500, 55000, 40000, 100000, 110000, 120500, 140000, 125000],
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1
        },
        {
        label: ['RM'],
        data: [125000, 70000, 25000, 220000, 112500, 5000, 40000, 150000, 110000, 125500, 150000, 105000],
        fill: false,
        borderColor: 'rgb(255, 192, 192)',
        tension: 0.1
        }
    ]
    };
    const profitloss_mainConfig = {
        type: 'line',
        data: profitloss_mainData,
        options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
        }
    };

    new Chart(profitloss_main, profitloss_mainConfig);

    const varcost_main = document.getElementById('varcost_main').getContext('2d');
    //const labels = Utils.months({count: 7});
    const varcost_maindata = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Des'],
        datasets: [
        {
        label: ['PS'],
        data: [120000, 50000, 75000, 22000, 12500, 55000, 40000, 100000, 110000, 120500, 140000, 125000],
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1
        },
        {
        label: ['RM'],
        data: [125000, 70000, 25000, 220000, 112500, 5000, 40000, 150000, 110000, 125500, 150000, 105000],
        fill: false,
        borderColor: 'rgb(255, 192, 192)',
        tension: 0.1
        }
    ]
    };
    const varcost_mainconfig = {
        type: 'line',
        data: varcost_maindata,
        options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
        }
    };

    new Chart(varcost_main, varcost_mainconfig);

    const costbbm_main = document.getElementById('costbbm_main').getContext('2d');
    //const labels = Utils.months({count: 7});
    const costbbm_maindata = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
        datasets: [
        {
        label: ['Cost (dalam ribuan rupiah)'],
        data: [65, 59, 80, 81, 56, 55, 40],
        fill: false,
        borderColor: 'rgb(100, 100, 255)',
        tension: 0.1
        },
        {
        label: ['Lama Pemakaian (bulan)'],
        data: [12, 10, 32, 30, 12, 11, 10],
        fill: false,
        borderColor: 'rgb(100, 255, 100)',
        tension: 0.1
        },
        {
        label: ['BBM (Liter)'],
        data: [10, 12, 34, 77, 34, 21, 22],
        fill: false,
        borderColor: 'rgb(255, 100, 100)',
        tension: 0.1
        }
    ]
    };
    const costbbm_mainconfig = {
        type: 'line',
        data: costbbm_maindata,
        options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
        }
    };

    new Chart(costbbm_main, costbbm_mainconfig);