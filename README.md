#influence-predictor

We planned to create an influence predictor. Using this project, we can find the influence of a person, event or anything. We are calculating the influence of a particular thing by using 2 APIs. 

1.	SocialMention
2.	Alchemy


*SocialMention*
-------------

Social Mention is the social media search and analysis platform that aggregates users general content from across the universe in a single stream of information. So, We can get data about the particular thing easily by using SocialMention API.


*Alchemy*
--------

AlchemyAPI provides advanced cloud-based and on-premise text analysis infrastructure that eliminates the expense and difficulty of integrating natural language processing systems into our application, service, or data processing pipeline. So, We can process the links that we got from the socialmention just by passing it in Alchamey’s API. 
Then the final step is to aggregate the scores we get from Alchamey’s API. This can show us the real influence of that object. It may be positive or negative.


By adding all the scores, We will get the positive and negative influence of that object.

*Documentation*
------------
We can get the influence of the object just by running the code as

###*```../influence-predictor.php?q=object```*

This code will return the positive and negative influence of that object.


*Credits*
-------

[Naga Raj](https://www.facebook.com/oneto018)

[Chennai Geeks](https://www.facebook.com/groups/chennaigeeks/)