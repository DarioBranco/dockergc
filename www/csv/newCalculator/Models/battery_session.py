from sqlalchemy import Column, Integer, String, Text
from sqlalchemy.ext.declarative import declarative_base

Base = declarative_base()

class battery_session(Base):
	__tablename__ = 'battery_session'
	id = Column(Integer, primary_key=True)
	BatID = Column(Text)
	Time = Column(Text)
	SOCStart = Column(Text)
	SOCEnd = Column(Text)
	SwID = Column(Text)
	startPoint = Column(Text)
	endPoint = Column(Text)
	pathTofile = Column(Text)