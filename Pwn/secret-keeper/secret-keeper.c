#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>


int main(){
    setvbuf(stdout  , 0, 2, 0);
    setvbuf(stdin   , 0, 2, 0);
    setvbuf(stderr  , 0, 2, 0);   

    char name[0x30], buf[0x100]; 
    
    printf("Hi, What's your name?\n");
    scanf("%s", name);

    printf("Hi! ");
    printf(name);

    printf("Give me your secret! I'll save it for you.");
    scanf("%s", buf);
    printf("Saved!");

    printf("See you next time!");

    return 0;
}
