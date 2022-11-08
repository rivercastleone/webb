from requests import get
from bs4 import BeautifulSoup


def extract_wwr_jobs(keyword):
    base_url = "https://weworkremotely.com/remote-jobs/search?term="
    response = get(f"{base_url}{keyword}")
    if response.status_code != 200:
        print("Can't request website")
    else:
        results=[]
        soup = BeautifulSoup(response.text, "html.parser")
        jobs =soup.find_all('section',class_="jobs")
        for job in jobs:
            job_posts = job.find_all('li')
            job_posts.pop(-1)
            for post in job_posts:
                anchors = post.find_all('a')
                anchor = anchors[1]
                link = anchor['href']
#list의 길이를 알고 있는 경우 키워드 인자처럼 변수를 순차적으로 나열해서 인자를 각 값을 나열된 변수에 저장 할 수 있다
                company, kind, region = anchor.find_all('span', class_="company")
                title = anchor.find('span', class_='title')
#element.string = 문자만 추출
                job_data = {
                'company': company.string,
                'kind': kind.string,
                'region': region.string,
                'title': title.string,
                'link': f"https://weworkremotely.com{link}"
                }

    results.append(job_data)
    test=extract_wwr_jobs("python")
    print(test)
