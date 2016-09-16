"""
card_back.png
clubs
diamonds
files.txt
hearts
spades
"""


def writeName(suite):
    base = 'images/'
    for i in range(13):
        print(base + suite + '/' + str(i + 1) + '.png')




suites = ['spades','clubs','diamonds','hearts']


for element in suites:
    writeName(element)

