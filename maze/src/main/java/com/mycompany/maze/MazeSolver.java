package com.mycompany.maze;

import com.mycompany.maze.Position;
import java.io.File;
import java.io.FileNotFoundException;
import java.util.ArrayList;
import java.util.Arrays;

import java.util.Scanner;

public class MazeSolver {


	//0 = wall
	//1 = path
	//2 = destination
	
	public static void main(String[] args) throws FileNotFoundException {

		ArrayList<Maze> mazes = new ArrayList<Maze>();
		
		Maze maze = new Maze();
		
		Scanner scanIn = new Scanner(new File("mazes.txt")); //get mazes from txt file
		int rows = Integer.parseInt(scanIn.nextLine());
		maze.maze = new int[rows][];
		
		for(int i = 0; i < rows; i++) {
			String line = scanIn.nextLine();
			maze.maze[i] = Arrays.stream(line.split(", ")).mapToInt(Integer::parseInt).toArray();
		}
		
		maze.startP = new Position(Integer.parseInt(scanIn.nextLine()), Integer.parseInt(scanIn.nextLine()));
		
		mazes.add(maze);
		
		int i = 0;
		while(i < mazes.size()) {
			if(solveMaze(mazes.get(i))) {
				System.out.println("You won!");
			} else {
				System.out.println("No path");
			}
			i++;
		}
	}
	//to solve the maze
	private static boolean solveMaze(Maze maze) {

		Position p = maze.startP;
		maze.position.push(p);
		
		
		while(true) {
			int y = maze.position.peek().y;
			int x = maze.position.peek().x;
			
			maze.maze[y][x] = 0;

			//down
			if(checkValid(y+1, x, maze)) {
				if(maze.maze[y+1][x] == 2) {
					System.out.println("Moved down");
					return true;
				} else if(maze.maze[y+1][x] == 1) {
					System.out.println("Moved down");
					maze.position.push(new Position(y+1, x));
					continue;
				}
			}

			//left
			if(checkValid(y, x-1, maze)) {
				if(maze.maze[y][x-1] == 2) {
					System.out.println("Moved left");
					return true;
				} else if(maze.maze[y][x-1] == 1) {
					System.out.println("Moved left");
					maze.position.push(new Position(y, x-1));
					continue;
				}
			}
			
			//up
			if(checkValid(y-1, x, maze)) {
				if(maze.maze[y-1][x] == 2) {
					System.out.println("Moved up");
					return true;
				} else if(maze.maze[y-1][x] == 1) {
					System.out.println("Moved up");
					maze.position.push(new Position(y-1, x));
					continue;
				}
			}

			//right
			if(checkValid(y, x+1, maze)) {
				if(maze.maze[y][x+1] == 2) {
					System.out.println("Moved right");
					return true;
				} else if(maze.maze[y][x+1] == 1) {
					System.out.println("Moved right");
					maze.position.push(new Position(y, x+1));
					continue;
				}
			}
			
			maze.position.pop();
			System.out.println("Moved back");
			if(maze.position.size() <= 0) {
				return false;
			}
		}
	}
        // check the exist is valid 
	public static boolean checkValid(int y, int x, Maze m) {
		if(y < 0 || 
			y >= m.maze.length ||
			x < 0 ||
			x >= m.maze[y].length
		 ) {
			return false;
		}
		return true;
	}

}
